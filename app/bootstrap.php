<?php
    // Load Config
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/mailer.php';
    require_once 'helpers/generateToken.php';
    require_once 'helpers/mailchimp.php';
    require_once 'helpers/addImages.php';
    require_once 'helpers/stripe_payment.php';

    // Autoload Core Libraries
    spl_autoload_register(function ($classname){
        if(substr($classname, 0, 9) === 'PHPMailer'){
            require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
            require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';
        } elseif (substr($classname, 0, 5) === 'DrewM') {
            require_once '../vendor/drewm/mailchimp-api/src/MailChimp.php';
        } elseif (substr($classname, 0, 6) === 'Stripe') {
            require_once '../vendor/stripe/stripe-php/init.php';
        } else{
            require_once 'libraries/' . $classname . '.php';
        }
    });