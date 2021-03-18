<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User;
    }

    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Garret');

        $this->assertEquals($this->user->getLastName(), 'Garret');
    }

    public function testFullNameIsReturned()
    {
        $this->user->setFirstName('Billy');

        $this->user->setLastName('Garret');

        $this->assertEquals($this->user->getFullName(), "Billy Garret");
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $this->user->setFirstName('Billy  ');

        $this->user->setLastName('  Garret');

        $this->assertEquals($this->user->getFirstName(), 'Billy');

        $this->assertEquals($this->user->getLastName(), 'Garret');

    }

    public function testEmailAddressCanBeSet()
    {
       $this->user->setEmail('jesse@invent.com');
        $this->assertEquals($this->user->getEmail(), 'jesse@invent.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $this->user->setFirstName('Billy');

        $this->user->setLastName('Garret');

        $this->user->setEmail('jesse@invent.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);


        $this->assertEquals($emailVariables['full_name'], 'Billy Garret');
        $this->assertEquals($emailVariables['email'], 'jesse@invent.com');

    }

}