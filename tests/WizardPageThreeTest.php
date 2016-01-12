<?php

/**
 * Functional tests for the profile wizard
 *
 * @todo Swap out hardcoded routes for Laravel routes
 * @todo Add translation widget
 * @todo Umbert and I have agreed today that Next on page 1 and page 2 does not save, it
 * just goes between pages. Thus I'll need to work out how to inject pages 1 and 2 before
 * doing any successful saves - or do those screens not have mandatory info?
 */
class WizardPageThreeTest extends TestCase
{
    /**
     * Check that the Previous button works as expected
     */
    public function testClickingPreviousGoesToPageTwo()
    {
        $this->
            visitWizardPageThree()->
            click(trans('public.wizard.previous'))->
            seePageIs('/edit/profile/2');
    }

    /**
     * When successfully saving, check we send the user to the profile screen
     *
     * This wasn't in the wireframe/spec, so Umbert and myself just agreed on where to send them.
     */
    public function clickingFinishSavesAndGoesToProfileBrowser()
    {
        // Check we go to the right place and get a save message
        $this->
            visitWizardPageThree()->
            type('value', 'field')->
            type('value', 'field')->
            click(trans('public.wizard.finish'))->
            seePageIs('/edit/profile/2')->
            checkSuccessfulSaveMessage();

        // Check that the save was successful
        $this->
            visit('/profile/testuser')->
            see("testuser's profile")->
            see("Description"); // FIXME
    }

    /**
     * Users may wish not to add a profile, or to add one later
     */
    public function testEmptyProfileUrlIsAllowed()
    {
        $this->
            visitWizardPageThree()->
            click(trans('public.wizard.finish'));

        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * If there is anything in the URL field it must be http or https
     */
    public function testNonWebUrlIsDisallowed()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Let's refuse URLs that are too long
     */
    public function testExcessivelyLongUrlIsDisallowed()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * The description is presently not mandatory
     */
    public function testEmptyDescriptionIsAllowed()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Disallow a profile description over a certain length
     */
    public function testExcessivelyLongDescriptionIsDisallowed()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Let's check that JavaScript inside Markdown is rendered harmless
     */
    public function testJavaScriptIsMadeSafe()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Checks the final wizard page saved OK
     *
     * The save message was not on the wireframe, so the below is a suggestion - feel free to
     * amend this if necessary.
     *
     * @return \WizardPageThreeTest
     */
    protected function checkSuccessfulSaveMessage()
    {
        return $this->see(
            "Profile saved successfully. Now go ahead and browse profiles of available users!"
        );
    }

    /**
     * Directs the internal browser component to visit page 3 of the profile wizard
     *
     * @return \WizardPageThreeTest
     */
    protected function visitWizardPageThree()
    {
        return $this->
            loginTestUser()->
            visit('/edit/profile/3');
    }
}
