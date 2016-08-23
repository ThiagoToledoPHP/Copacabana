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
     * Simple test title
     */
    public function testTitle()
    {
        $this->url(URL_SELENIUM_ACCESS);
        $this->assertEquals(':)', $this->byId('smile')->text());
    }

}
