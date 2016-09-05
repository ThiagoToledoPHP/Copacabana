<?php

namespace TestCopacabana\app\Controllers{

    class ExampleDynamicController
    {

        //Example for dynamic controller.
        //See more about in addDynamicControllerToList API Info
        public function page($array){
            //Check for "page" word to example
            if(strpos($array[0],"page") !== false){
                echo "<html><body><span id='return'>".$array[0]."</span></body></html>";
                return true;
            }else{
                return false;
            }
        }

    }

}