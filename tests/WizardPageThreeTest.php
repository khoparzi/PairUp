<?php

/**
 * Functional tests for the profile wizard
 */
class WizardPageThreeTest extends TestCase
{
    /**
     * Users may wish not to add a profile, or to add one later
     */
    public function testEmptyProfileUrlIsAllowed()
    {
        
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
}
