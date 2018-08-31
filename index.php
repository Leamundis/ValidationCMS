<?php
    session_start();

    $specialMorganConfigFile = fopen(".tofu", "r"); // Yeah! Rock'n'Roll! 
    $configData = fread($specialMorganConfigFile, filesize(".tofu"));
    $lines = explode(PHP_EOL, $configData);
    foreach($lines as $line) {
        if(strpos($line, '=')) {
            $global = explode("=", $line);
            define($global[0], $global[1]);
        }
    }

    spl_autoload_register(function($className) {
        $directory = '';
        if(strpos($className, 'Helper')) {
            $directory = 'helpers';
        } else if(strpos($className, 'Controller')){
            $directory = 'controllers';
        } else if(strpos($className, 'Model')) {
            $directory = 'models';
        } else {
            throw new \Exception("Error including class. Check your code");
        }
        include './' . $directory . '/' . $className . '.php';
    });

   
    RouteHelper::getRoute();
