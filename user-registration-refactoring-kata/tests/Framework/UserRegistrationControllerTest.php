<?php

namespace Tests\App\Framework;

use App\Controller\UserRegistrationController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRegistrationControllerTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        UserRegistrationController::$orm = null;
    }

    public function test_should_success_when_everything_is_valid(): void
    {
        $client = static::createClient();

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_123123');

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function test_should_returns_a_user_with_the_email_when_everything_is_valid(): void
    {
        $client = static::createClient();

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_123123');

        $this->assertEquals('my@email.com', json_decode($client->getResponse()->getContent(), true)['email']);
    }


    public function test_should_returns_a_user_with_the_name_when_everything_is_valid(): void
    {
        $client = static::createClient();

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_123123');

        $this->assertEquals('Codium', json_decode($client->getResponse()->getContent(), true)['name']);
    }


    public function test_should_fail_when_password_is_short(): void
    {
        $client = static::createClient();

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_1');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertEquals('Password is not valid', json_decode($client->getResponse()->getContent()));
    }

    public function test_should_fail_when_password_does_not_contain_underscore(): void
    {
        $client = static::createClient();

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass1234');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertEquals('Password is not valid', json_decode($client->getResponse()->getContent()));
    }

    public function test_should_fail_when_email_is_used(): void
    {
        $client = static::createClient();
        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_1234');

        $client->request('POST', '/users?name=Codium&email=my@email.com&password=myPass_1234');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertEquals('The email is already in use', json_decode($client->getResponse()->getContent()));
    }
}
