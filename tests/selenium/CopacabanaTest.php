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

    public function testTitle()
    {
        $this->url('http://www.example.com/');
        $this->assertEquals('Example Domain', $this->title());
    }


    /**
     * Simple test title
     */

    public function testTitle2()
    {
        $this->url(URL_SELENIUM_ACCESS);
        $this->assertEquals(':)', $this->byId('smile')->text());
    }

    public function testTitle3()
    {
        $this->url(URL_SELENIUM_ACCESS."t");
        $this->assertEquals(':P', $this->byId('smile')->text());
    }


}
