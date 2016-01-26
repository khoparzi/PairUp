<?php

/**
 * Functional tests for the profile wizard
 */
class WizardPageOneTest extends TestCase
{
    public function testNextButtonExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see(trans("public.wizard.next"));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->press(trans("public.wizard.next"))
            ->seePageIs(route('public.wizard.SecondPage'));
    }

    public function testFormExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see("personalDataForm");
    }

    public function testFirstNameFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see(trans("forms.first_name"));
    }

    public function testLastNameFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see(trans("forms.last_name"));
    }

    public function testTownFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see(trans("forms.town"));
    }

    public function testCountryFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.first'))
            ->see(trans("forms.country"));
    }
}
