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
            ->visitFirstWizardPage()
            ->see(trans("public.wizard.next"));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->press(trans("public.wizard.next"))
            ->seePageIs(route('public.wizard.SecondPage'));
    }

    public function testFormExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->see("personalDataForm");
    }

    public function testFirstNameFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->see(trans("forms.first_name"));
    }

    public function testLastNameFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->see(trans("forms.last_name"));
    }

    public function testTownFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->see(trans("forms.town"));
    }

    public function testCountryFieldExist()
    {
        $this
            ->visit(route('public.login'))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitFirstWizardPage()
            ->see(trans("forms.country"));
    }
}
