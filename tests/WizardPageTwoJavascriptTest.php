<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
//use Illuminate\Support\Facades\Config;
use Illuminate\Config;

class WizardPageTwoJavascriptTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected $webDriver;

    protected $baseUrl = 'http://pairup.dev/';

//    public function setUp()
//    {
//        $capabilities = DesiredCapabilities::firefox();
//        $this->webDriver = RemoteWebDriver::create($this->baseUrl, $capabilities);
//    }

    public function tearDown()
    {
//        $this->webDriver->close();
    }

    public function testUsingSelenium()
    {
        require_once('../vendor/autoload.php');
// start Firefox with 5 second timeout
        $host = 'http://localhost'; // this is the default
        $capabilities = DesiredCapabilities::firefox();
        $driver = RemoteWebDriver::create($host, $capabilities, 5000);

// navigate to 'http://docs.seleniumhq.org/'
        $driver->get('http://docs.seleniumhq.org/');

// adding cookie
        $driver->manage()->deleteAllCookies();
        $driver->manage()->addCookie(array(
            'name' => 'cookie_name',
            'value' => 'cookie_value',
        ));
        $cookies = $driver->manage()->getCookies();
        print_r($cookies);

// click the link 'About'
        $link = $driver->findElement(
            WebDriverBy::id('menu_about')
        );
        $link->click();
//        $this->webDriver->get($this->baseUrl);
//
//        $body = $this->webDriver->findElement(WebDriverBy::tagName('body'));
//
//        $this->assertContains(trans('public.words.welcome'), $body->getText());

    }

    public function testNewSkillRowIsAdded()
    {

        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testWeCanEditTheNewSkillName()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testWeCanEditTheStarsRating()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testWeCanChangeSeekingHelpTickBox()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testWeCanChangeOfferingHelpTickBox()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
