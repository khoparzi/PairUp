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
            ->visit('/edit/profile/2')
            ->see(trans("wizard.general.new_skill"));
    }

    public function testPreviousButtonExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/2')
            ->see(trans("pagination.previous"));
    }

    public function testNextButtonExist()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/2')
            ->see(trans("pagination.next"));
    }

    public function testPreviousButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/2')
            ->press(trans("pagination.previous"))
            ->seePageIs(route('wizard.FirstPage'));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/2')
            ->press(trans("pagination.next"))
            ->seePageIs(route('wizard.ThirdPage'));
    }

    public function testNewSkillButtonRedirect()
    {
        $this
            ->visit('/login')
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit('/edit/profile/2')
            ->press(trans("wizard.general.new_skill"))
            ->seePageIs(route('wizard.AddSkill'));
    }
}
