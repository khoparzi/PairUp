<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * A method to login as a test user in a Laravel (non-Selenium) functional test
     *
     * @todo Check the informational message is within a success class
     */
    protected function loginTestUser()
    {
        // Do a login here
        $this->
            visit(route("public.login"))->
            type('testuser', 'username')->
            type('testpass', 'password')->
            press(trans('public.buttons.login'))->
            seePageIs('/')->
            see(trans('public.words.signedIn'));

        return $this;
    }

    /**
     * Deprecated for now
     *
     * @param integer $page
     * @return TestCase
     */
    protected function visitWizardPage($page = 1)
    {
        return $this->visit(route('profile.edit'), ['page' => $page, ]);
    }

    protected function visitFirstWizardPage()
    {
        return $this->visit(route('public.wizard.first'));
    }

    protected function visitSecondWizardPage()
    {
        return $this->visit(route('public.wizard.first'));
    }

    protected function seeSuccessMessage($message)
    {
        return $this->seeInElement('div.success', $message);
    }

    protected function seeErrorMessage($message)
    {
        return $this->seeInElement('div.error', $message);
    }
}
