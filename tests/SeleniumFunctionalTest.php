<?php

use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

/* 
 * A demonstration test using Selenium
 * 
 * This will be required for pages that need JavaScript, but see ExampleTest.php for
 * an approach that does functional testing at the application level.
 */
class SeleniumFunctionalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected $webDriver;

    protected $baseUrl = 'http://localhost:8000/';

    public function setUp()
    {
        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function testUsingSelenium()
    {
        $this->webDriver->get($this->baseUrl);

        $body = WebDriverBy::tagName('body');
        $this->assertContains('Laravel', $body);
    }
}
