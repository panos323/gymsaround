<?php
    // Load Config
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/mailer.php';

    // Autoload Core Libraries
    spl_autoload_register(function ($classname){
        if(substr($classname, 0, 9) === 'PHPMailer'){
            require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
            require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';
        }else{
            require_once 'libraries/' . $classname . '.php';
        }
    });