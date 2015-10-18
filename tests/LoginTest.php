<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class LoginTest Functional tests for the login screen
 */
class LoginTest extends TestCase
{
    /**
     * Checks that if the email field is empty it displays a fail message
     */
    public function testEmptyEmail()
    {
        $this
            ->visit('/login')
            ->type('this_is_a_password', 'password')
            ->pressSubmit()
            ->see(trans('validation.required', array('attribute' => 'email')));
    }

    /**
     * Checks that if the password is empty it dispalys a fail message
     */
    public function testEmptyPassword()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->see(trans('validation.required', array('attribute' => 'password')));
    }

    /**
     * Checks that if the email is in an invalid format it displays a fail message
     */
    public function testInvalidEmail()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that if all the login details are valid it let us go through
     */
    public function testValidLogin()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that if the login details are not valid it displays an error message
     */
    public function testInvalidLogin()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that if the forgotten password link in the login page redirects succesfully to the right page
     */
    public function testForgotPaswordLinkDrivesToThePage()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that if the user inputs the username instead of the email throws an error message
     */
    public function testValidUsernameAndPasswordThrowsPasswordFailure()
    {
        //@TODO: Implementation pending
    }

    /**
     * Press the submit button present in the page (if does exist)
     *
     * @return $this
     */
    protected function pressSubmit()
    {
        return $this->press("submit");
    }
}
