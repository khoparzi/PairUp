<?php

/**
 * Functional tests for the profile wizard
 */
class WizardPageTwoTest extends TestCase
{
    public function testHyperLinkToAddANewSkillExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->see(trans("public.wizard.new_skill"));
    }

    public function testPreviousButtonExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->see(trans("public.wizard.previous"));
    }

    public function testNextButtonExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->see(trans("public.wizard.next"));
    }

    public function testPreviousButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->press(trans("public.wizard.previous"))
            ->seePageIs(route('wizard.FirstPage'));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->press(trans("public.wizard.next"))
            ->seePageIs(route('wizard.ThirdPage'));
    }

    public function testNewSkillButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visitWizardPage(2)
            ->press(trans("public.wizard.new_skill"))
            ->seePageIs(route('wizard.AddSkill'));
    }
}
