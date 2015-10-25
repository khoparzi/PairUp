<?php

/**
 * Functional tests for the registration screen
 */
class RegistrationTest extends TestCase
{
    /**
     * Checks that we get an error under all fields that are empty
     */
    public function testAllFieldsMissing()
    {
        // TODO
    }

    public function testPasswordMismatch()
    {
        // TODO Set up test user using migration/seeder?

        $this->
            visit('/register')->
            type('testuser', 'username')->
            type('test@example.com', 'email')->
            type('testpass', 'password1')->
            type('testpass-different', 'password2')->
            press('Register')->
            seePageIs('/register')->
            see('Passwords do not match, please try again');
    }

    public function testUsernameAlreadyTaken()
    {
        // TODO
    }

    // TODO more tests go here
}
