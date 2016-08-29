<?php

namespace Copacabana\helpers;

/**
 * Light Stalk Composer Framework Class
 *
 * @autor Thiago Toledo
 * @email javaephp@gmail.com
 * @link https://github.com/ThiagoToledoPHP/Copacabana
 * @package Copacabana\helpers
 */
class Copacabana
{

    /** @var string $dirControllers The directory of your controllers class */
    private $dirControllers;

    /** @var string $mainMethodController Main method name in controllers class */
    private $mainMethodController;

    /** @var string $notFoundController Not found controller file and class */
    private $notFoundController;

    /** @var string $indexController Index (main) controller file and class */
    private $indexController;

    /** @var string $appName App name */
    private $appName;

    /** @var boolean $isCamelCase Camel Case option */
    private $isCamelCase;

    /**
     * Copacabana constructor.
     * In $appName you must use the same name used in the first part of the namespace of your control classes
     * to Copacabana dynamically call them in your application using Composer.
     * Simple pedagogic example:
     * if you use $appName = "Copacabana"
     * in composer file (autoload / psr-4) you can use: "Copacabana\\helpers\\": "app/Helpers/"
     *
     * @param string $appName The name of your app. The first part of composer namespace class.
     */
    public function __construct($appName)
    {
        $this->setAppName($appName);

        //Default setup
        $this->setDirControllers("app/Controllers/");
        $this->setMainControllers("main");
        $this->setNotFoundController("NotFound");
        $this->isCamelCase(true);
        $this->setIndexController("Index");
    }


    /**
     * Determine the app name
     * @param string $appName The name of your app. The first part of composer namespace class.
     */
    public function setAppName($appName)
    {
        $this->appName = $appName;
    }

    /**
     * This method is used to set the directory of your controllers class.
     * Example of bars format: "app/Controllers/"
     * Important: They should also be in the declaration of its namespace in the composer file
     * Simple pedagogic example:
     * if you use $dirControllers = "app/Controllers/"
     * in composer file (autoload / psr-4) you can use:
     * "Copacabana\\app\\Controllers\\": "yourDirNameIfYouNeed/app/Controllers/"
     *
     * @param string $dirControllers The directory way to your controllers
     */
    public function setDirControllers($dirControllers)
    {
        $this->dirControllers = $dirControllers;
    }

    /**
     * Used to determine the method Name in controller class to respond to app requests
     * @param $mainMethodController The method name used in your controller class to respond to app requests
     */
    public function setMainControllers($mainMethodController)
    {
        $this->mainMethodController = $mainMethodController;
    }

    /**
     * Use to determine the controller class Name to respond not found requests
     * @param string $notFoundController The class name to 404 requests
     */
    public function setNotFoundController($notFoundController)
    {
        $this->notFoundController = $notFoundController;
    }

    /**
     * Use to determine if you use or not to Camel Case in your controllers
     * If set true, automatically automatically includes the first letter to uppercase the url requests control classes
     * Pedagogic example: in example url: www.test.com/example the class file and name Example is request
     * @param boolean $isCamelCase Determine if you use or not to Camel Case in your controllers class
     */
    public function isCamelCase($isCamelCase)
    {
        $this->isCamelCase = $isCamelCase;
    }

    /**
     * Used to determine the method Name in controller class to respond to index requests
     * @param $indexController The method name used in your controller class to respond to index requests
     */
    public function setIndexController($indexController)
    {
        $this->indexController = $indexController;
    }

    /**
     * Method used to start router the app requisitions
     */
    public function listen()
    {

        $controllerClassFileName = "";

        if (isset($_GET) && is_array($_GET) && sizeof($_GET) > 0) {
            //Separate the url args in  array
            $arrayGetArgs = explode("/", $_GET['url']);

            //If send more than one url arg...
            if (is_array($arrayGetArgs) && sizeof($arrayGetArgs) > 0) {
                if ($this->isCamelCase === false) {
                    $controllerClassFileName = $arrayGetArgs[0];
                } else {
                    $controllerClassFileName = ucfirst($arrayGetArgs[0]);
                }



                //The project search for a file with the arg data, position zero, first caracter Caps
                $urlFile = $this->dirControllers.$controllerClassFileName.".php";


                //File exists
                if (is_file($urlFile)) {
                    $finalClassName = $this->appName."\\".str_replace("/", "\\", $this->dirControllers).
                        $controllerClassFileName;

                    //Instanciate and send via param all the get data send in array format. use the main method
                    $$controllerClassFileName = new $finalClassName();
                    $$controllerClassFileName->{$this->mainMethodController}($arrayGetArgs);

                    //If don't exists a file, the system use the not found class (Controller)
                } else {
                    $notFoundClassName = $this->notFoundController;
                    $finalNotFoundClassName = $this->appName."\\".str_replace("/", "\\", $this->dirControllers).
                        $this->notFoundController;

                    $$notFoundClassName = new $finalNotFoundClassName();

                    //Using the main method
                    $$notFoundClassName->{$this->mainMethodController}();

                    // add records to the log
                }
            } else {
                //Log a bad requisition, saving the anormal data
            }

            //If don't send a special args in get, load the index controller class and use the main method
        } else {
            $className = $this->appName."\\".str_replace("/", "\\", $this->dirControllers).$this->indexController;
            $index = new $className();
            $index->{$this->mainMethodController}();
        }
    }
}
