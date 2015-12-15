<?php

/**
 * Functional tests for the profile wizard
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
            click('Previous')->
            seePageIs('/edit/profile/2');
    }

    /**
     * When successfully saving, check we send the user to the profile screen
     *
     * This wasn't in the wireframe/spec, so Umbert and myself just agreed on where to send them.
     */
    public function clickingFinishGoesToProfileBrowser()
    {
        $this->
            visitWizardPageThree()->
            click('Finish')->
            seePageIs('/edit/profile/2');
    }

    /**
     * Users may wish not to add a profile, or to add one later
     */
    public function testEmptyProfileUrlIsAllowed()
    {
        $this->
            visitWizardPageThree()->
            click('Finish');
        // @todo Finish this
    }

    /**
     * If there is anything in the URL field it must be http or https
     */
    public function testNonWebUrlIsDisallowed()
    {
        
    }

    /**
     * Let's refuse URLs that are too long
     */
    public function testExcessivelyLongUrlIsDisallowed()
    {
        
    }

    /**
     * The description is presently not mandatory
     */
    public function testEmptyDescriptionIsAllowed()
    {
        
    }

    /**
     * Disallow a profile description over a certain length
     */
    public function testExcessivelyLongDescriptionIsDisallowed()
    {
        
    }

    /**
     * Let's check that JavaScript inside Markdown is rendered harmless
     */
    public function testJavaScriptIsMadeSafe()
    {
        
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
