<?php

namespace Copacabana\tests\selenium;

use PHPUnit_Extensions_Selenium2TestCase;

//include_once("tests/config.php");

/**
 * LoginTest Test is a tester class for testing the login in system
 *
 * @autor Thiago Toledo
 * @email javaephp@gmail.com
 */
class LoginTest extends PHPUnit_Extensions_Selenium2TestCase
{

    /**
     * Set up method
     */
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.example.com/');
    }


    /**
     * Simple return index controller test
     */
    public function testReturnIndexController()
    {
        $this->url(URL_SELENIUM_ACCESS);
        $this->assertEquals('IndexController', $this->byId('return')->text());
    }

    public function testReturnNotFoundController()
    {
        $this->url(URL_SELENIUM_ACCESS."?url=t");
        $this->assertEquals('NotFoundController', $this->byId('return')->text());
    }

    public function testReturnExampleController()
    {
        $this->url(URL_SELENIUM_ACCESS."?url=example");
        $this->assertEquals('ExampleController', $this->byId('return')->text());
    }

    public function testReturnDynamicController()
    {
        $randowTestUrl = md5(date("YmdHis"))."page";
        $this->url(URL_SELENIUM_ACCESS."?url=".$randowTestUrl);
        $this->assertEquals($randowTestUrl, $this->byId('return')->text());
    }


}
