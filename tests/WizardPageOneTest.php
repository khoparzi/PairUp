<?php

/**
 * Functional tests for the profile wizard
 */
class WizardPageOneTest extends TestCase
{
    public function testNextButtonExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see(trans("public.wizard.next"));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->press(trans("public.wizard.next"))
            ->seePageIs(route('wizard.SecondPage'));
    }

    public function testFormExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see("personalDataForm");
    }

    public function testFirstNameFieldExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see(trans("forms.first_name"));
    }

    public function testLastNameFieldExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see(trans("forms.last_name"));
    }

    public function testTownFieldExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see(trans("forms.town"));
    }

    public function testCountryFieldExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/1')
            ->see(trans("forms.country"));
    }
}
