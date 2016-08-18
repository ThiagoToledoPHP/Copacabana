<?php

namespace Copacabana\helpers;

/**
 * Light Stalk Framework Class
 *
 * @autor Thiago Toledo
 * @email javaephp@gmail.com
 */
class Copacabana
{

    private $dirControllers;
    private $mainMethodController;
    private $notFoundController;
    private $indexController;
    private $psrLogObject;
    private $appName;
    private $isCamelCase;

    function __construct($appName)
    {
        $this->appName = $appName;

        //Default setup
        $this->dirControllers = "app/controllers/";
        $this->mainMethodController = "main";
        $this->notFoundController = "NotFound";
        $this->psrLogObject = null;
        $this->isCamelCase = true;
        $this->indexController = "Index";
    }

    function setDirControllers($dirControllers)
    {
        $this->dirControllers = $dirControllers;
    }

    function setMainControllers($mainMethodController)
    {
        $this->mainMethodController = $mainMethodController;
    }

    function setNotFoundController($notFoundController){
        $this->notFoundController = $notFoundController;
    }

    function setPsrLogObject($psrLogObject){
        $this->psrLogObject = $psrLogObject;
    }

    function isCamelCase($isCamelCase){
        $this->isCamelCase = $isCamelCase;
    }

    function setIndexController($indexController){
        $this->indexController = $indexController;
    }

    function listen()
    {

        $controllerClassFileName = "";

        if (isset($_GET) && is_array($_GET) && sizeof($_GET) > 0) {

            //Separate the url args in  array
            $arrayGetArgs = explode("/", $_GET['url']);

            //If send more than one url arg...
            if (is_array($arrayGetArgs) && sizeof($arrayGetArgs) > 0) {

                if($this->isCamelCase === false)
                    $controllerClassFileName = $arrayGetArgs[0];
                else
                    $controllerClassFileName = ucfirst($arrayGetArgs[0]);


                //The project search for a file with the arg data, position zero, first caracter Caps
                $urlFile = $this->dirControllers.$controllerClassFileName.".php";

                //File exists
                if (is_file($urlFile)) {

                    $finalClassName = $this->appName."\\".str_replace("/","\\",$this->dirControllers).$controllerClassFileName;

                    //Instanciate and send via param all the get data send in array format. use the main method
                    $$controllerClassFileName = new $finalClassName();
                    $$controllerClassFileName->{$this->mainMethodController}($arrayGetArgs);

                    //If don't exists a file, the system use the not found class (Controller)
                } else {

                    $notFoundClassName = $this->notFoundController;
                    $finalNotFoundClassName = $this->appName."\\".str_replace("/","\\",$this->dirControllers).$this->notFoundController;

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
            $className = $this->appName."\\".str_replace("/","\\",$this->dirControllers).$this->indexController;
            $index = new $className();
            $index->{$this->mainMethodController}();
        }

    }

}