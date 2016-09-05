<?php

    include_once("../../vendor/autoload.php");

    $copacabana = new Copacabana\helpers\Copacabana("TestCopacabana");
    $exampleDynamicController = new \TestCopacabana\app\Controllers\ExampleDynamicController();
    $copacabana->addDynamicControllerToList($exampleDynamicController,"page");
    $copacabana->listen();

?>