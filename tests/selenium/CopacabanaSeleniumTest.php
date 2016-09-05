<?php

namespace Copacabana\tests\selenium;

use PHPUnit_Extensions_Selenium2TestCase;


/**
 * CopacabanaSeleniumTest is a Selenium tester class for testing the routers class
 * Using ?url= get param because in travis to use Selenium, is necessary using
 * Dev PHP Server, not the apache. In this case the mod_rewrite is off :(
 *
 * @autor Thiago Toledo
 * @email javaephp@gmail.com
 */
class CopacabanaSeleniumTest extends PHPUnit_Extensions_Selenium2TestCase
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
     * Return index controller router test
     */
    public function testReturnIndexController()
    {
        $this->url(URL_SELENIUM_ACCESS);
        $this->assertEquals('IndexController', $this->byId('return')->text());
    }

    /**
     * Return not found controller router test
     */
    public function testReturnNotFoundController()
    {
        $this->url(URL_SELENIUM_ACCESS."?url=t");
        $this->assertEquals('NotFoundController', $this->byId('return')->text());
    }

    /**
     * Return example controller router test
     */
    public function testReturnExampleController()
    {
        $this->url(URL_SELENIUM_ACCESS."?url=example");
        $this->assertEquals('ExampleController', $this->byId('return')->text());
    }

    /**
     * Return dynamic controller router test
     */
    public function testReturnDynamicController()
    {
        $randowTestUrl = md5(date("YmdHis"))."page";
        $this->url(URL_SELENIUM_ACCESS."?url=".$randowTestUrl);
        $this->assertEquals($randowTestUrl, $this->byId('return')->text());
    }


}