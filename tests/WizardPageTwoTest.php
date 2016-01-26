<?php

/**
 * Functional tests for the profile wizard
 */
class WizardPageTwoTest extends TestCase
{
    public function testHyperLinkToAddANewSkillExist()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->see(trans("public.wizard.new_skill"));
    }

    public function testPreviousButtonExist()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->see(trans("public.wizard.previous"));
    }

    public function testNextButtonExist()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->see(trans("public.wizard.next"));
    }

    public function testPreviousButtonRedirect()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->press(trans("public.wizard.previous"))
            ->seePageIs(route('public.wizard.first'));
    }

    public function testNextButtonRedirect()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->press(trans("public.wizard.next"))
            ->seePageIs(route('public.wizard.third'));
    }

    public function testNewSkillButtonRedirect()
    {
        $this
            ->visit(route("public.login"))
            ->type('valid@testEmail.com', 'email')
            ->pressSubmit()
            ->visit(route('public.wizard.second'))
            ->press(trans("public.wizard.new_skill"))
            ->seePageIs(route('public.wizard.AddSkill'));
    }
}
