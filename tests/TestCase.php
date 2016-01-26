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
     * @todo Subject to field names to be decided
     * @todo Check the informational message is within a success class
     */
    protected function loginTestUser()
    {
        // Do a login here
        $this->
            visit('/login')->
            type('testuser', 'username')->
            type('testpass', 'password')->
            press(trans('public.buttons.login'))->
            seePageIs('/')->
            see(trans('public.words.signedIn'));

        return $this;
    }

    protected function visitWizardPage($page = 1)
    {
        return $this->visit(route('profile.edit'), ['page' => $page, ]);
    }
}
