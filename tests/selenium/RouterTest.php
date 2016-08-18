<?php

    namespace Copacabana\tests\selenium;

    use Copacabana;
    use PHPUnit_Extensions_Selenium2TestCase;


    /**
     * RouterTest Test is a tester class for testing the router in class
     *
     * @autor Thiago Toledo
     * @email javaephp@gmail.com
     */
    class RouterTest extends PHPUnit_Extensions_Selenium2TestCase
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

        public function testTitle()
        {
            $this->url(URL_SELENIUM_ACCESS);
            $this->assertEquals('Login - Simple Call Center', $this->title());
        }
         */

        /**
         * Test the login

        public function testLogin()
        {
            $this->url(URL_SELENIUM_ACCESS);

            $this->byId('email_input')->value(EMAIL_SELENIUM_ACCESS);
            $this->byId('pass_input')->value(PASS_SELENIUM_ACCESS);
            $this->byId('bt_login_input')->click();

            $this->assertEquals('View tickets - Simple Call Center', $this->title());
        }
         */
    }
