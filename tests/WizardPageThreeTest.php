<?php

/**
 * Functional tests for the profile wizard
 *
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
        $this
            ->visitWizardPageThree()
            ->click(trans('public.wizard.previous'))
            ->seePageIs(route('edit.profile', ['page' => 2, ]));
    }

    /**
     * When successfully saving, check we send the user to the profile screen
     *
     * This wasn't in the wireframe/spec, so Umbert and myself just agreed on where to send them.
     *
     * @todo Swap out hardwired URLs with routes
     */
    public function clickingFinishSavesAndGoesToProfileBrowser()
    {
        // Check we go to the right place and get a save message
        $desc = "This is the description for testuser";
        $this
            ->visitWizardPageThree()
            ->type('url', 'http://example.com')
            ->type('description', $desc)
            ->clickFinish()
            ->checkSuccessfulSave();

        // Check that the save was successful
        $this
            ->visit('/profile/testuser')
            ->see(trans('profile.title', ['username' => 'testuser']))
            ->see(trans('public.profile.description'))
            ->see($desc);
    }

    /**
     * Users may wish not to add a profile, or to add one later
     */
    public function testEmptyProfileUrlIsAllowed()
    {
        $this
            ->visitWizardPageThree()
            ->type('url', '')
            ->clickFinish()
            ->checkSuccessfulSave();
    }

    /**
     * If there is anything in the URL field it must be http or https
     */
    public function testNonWebUrlIsDisallowed()
    {
        $this
            ->visitWizardPageThree()
            ->type('url', '')
            ->clickFinish()
            ->see(trans('public.wizard.errors.urlProtocols'));
    }

    /**
     * Let's refuse URLs that are too long
     *
     * @todo Centralise the maximum length here and in the validator that does the test
     */
    public function testExcessivelyLongUrlIsDisallowed()
    {
        $url = "http://" . str_repeat('long.string.', 100);
        $this
            ->visitWizardPageThree()
            ->type('url', $url)
            ->clickFinish()
            ->see(trans('public.wizard.errors.urlLength'));
    }

    /**
     * The description is presently not mandatory
     */
    public function testEmptyDescriptionIsAllowed()
    {
        $this
            ->visitWizardPageThree()
            ->type('description', '')
            ->clickFinish()
            ->checkSuccessfulSave();
    }

    /**
     * Disallow a profile description over a certain length
     *
     * @todo Add hardwired language string to dictionary
     * @todo Centralise the maximum length int here and in the validator that does the test
     */
    public function testExcessivelyLongDescriptionIsDisallowed()
    {
        $url = "http://" . str_repeat('long.string.', 100);
        $this
            ->visitWizardPageThree()
            ->type('description', $url)
            ->clickFinish()
            ->see(trans('public.wizard.errors.descriptionLength'));
    }

    /**
     * Let's check that JavaScript inside Markdown is rendered harmless
     *
     * @todo Check that if the JavaScript really were to be injected, this test would fail!
     */
    public function testJavaScriptIsMadeSafe()
    {
        $jsInjection = "<script type='text/javascript'>alert('Hello');</script>";
        $this
            ->visitWizardPageThree()
            ->type('description', $jsInjection)
            ->clickFinish()
            ->checkSuccessfulSave()
            ->visit('/profile/testuser')
            ->see($jsInjection);
    }

    /**
     * Checks that we get a successful save message, and that the page redirects as expected
     */
    protected function checkSuccessfulSave()
    {
        return $this
            ->checkSuccessfulSaveMessage()
            ->seePageIs('/profile/testuser');
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
        return $this->
            see(trans('public.wizard.saved'));
    }

    /**
     * Clicks the finish button in the third wizard page
     *
     * @return \WizardPageThreeTest
     */
    protected function clickFinish()
    {
        return $this
            ->click(trans('public.wizard.finish'));
    }

    /**
     * Directs the internal browser component to visit page 3 of the profile wizard
     *
     * @return \WizardPageThreeTest
     */
    protected function visitWizardPageThree()
    {
        return $this
            ->loginTestUser()
            ->visit(route('public.wizard.third'));
    }
}
