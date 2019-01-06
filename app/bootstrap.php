<?php
    // Load Config
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // Autoload Core Libraries
    spl_autoload_register(function ($classname){
        if(substr($classname, 0, 8) === 'Facebook'){
            require_once '../vendor/facebook/graph-sdk/src/Facebook/autoload.php';
        }else{
            require_once 'libraries/' . $classname . '.php';
        }
    });