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
        $this
            ->press('Register')
            ->see(trans("validation.required"));
    }

    /**
     * Checks that both inputted passwords match
     */
    public function testPasswordMismatch()
    {
        $this
            ->visit(route('public.register'))
            ->type('testuser', 'username')
            ->type('test@example.com', 'email')
            ->type('testpass', 'password1')
            ->type('testpass-different', 'password2')
            ->press('Register')
            ->seePageIs(route("public.register"))
            ->see(trans("validation.confirmed"));
    }

    /**
     * Checks that we cannot register a unique username twice
     */
    public function testUsernameAlreadyTaken()
    {
        $this
            ->visit(route("public.register"))
            ->type('repeatedUsername', 'username')
            ->type('test@example.com', 'email')
            ->type('testpass', 'password1')
            ->type('testpass', 'password2')
            ->press('Register')
            ->seePageIs(route("public.register"))
            ->see(trans("validation.custom.nicknameTaken"));
    }

    /**
     * Checks that we can register successfully
     */
    public function testSuccessfulRegistration()
    {
        $this
            ->visit(route("public.register"))
            ->type('uniqueUsername', 'username')
            ->type('test@example.com', 'email')
            ->type('testpass', 'password1')
            ->type('testpass', 'password2')
            ->press('Register')
            ->seePageIs(route("public.register"))
            ->see(trans("public.message.success.registration"));
    }

    /**
     * Checks that we receive a confirmation email after a successful registration
     */
    public function testReceiveConfirmationEmail()
    {
        //@TODO: To implement mailcatcher and it functionality
        $this
            ->visit(route("public.register"))
            ->type('uniqueUsername', 'username')
            ->type('test@example.com', 'email')
            ->type('testpass', 'password1')
            ->type('testpass', 'password2')
            ->press('Register')
            ->seePageIs(route("public.register"))
            ->see(trans("public.message.success.registration"));
    }

    /**
     * Checks that the forgotten email button is available in the page
     */
    public function testForgotEmailButtonExist()
    {
        $this
            ->visit(route("public.register"))
            ->see(trans("public.links.forgotPassword"));
    }

    /**
     * Checks that the forgotten button redirects to the correct page
     */
    public function testForgotEmailRedirect()
    {
        $this
            ->visit(route("public.register"))
            ->press(trans("public.links.forgotPassword"))
            ->seePageIs(route("forgotPassword"));
    }
}
