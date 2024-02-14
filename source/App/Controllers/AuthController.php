<?php

namespace Source\App\Controllers;

use League\OAuth2\Client\Provider\Google;
use Source\App\Controllers\HomeController;
use Source\App\Controllers\LoginController;

class AuthController
{    
    public static function login($provider = null){  
    $provider = $provider ? $provider : $_SESSION['provider'];
    if (empty($_SESSION['userLogin'])) {
        if ($provider) {
            LoginController::login($provider);
        }
    
    }else{
        /**
        * @var League\OAuth2\Client\Provider\GoogleUser $user
        */
        $user = unserialize($_SESSION['userLogin']);
        HomeController::index($user);
    }

    }

    public static function logout()
    {
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
        $_SESSION = array();
        session_destroy();
        $googleCookies = array(
            'SID',
            'SSID',
            'HSID',
            'SIDCC',
        );
    
        foreach ($googleCookies as $cookieName) {
            if (isset($_COOKIE[$cookieName])) {
                setcookie($cookieName, '', time()-3600, '/');
            }
        }
        header("Location: " . URL_BASE);
        //header("Location: " . "https://mail.google.com/mail/u/0/?logout&hl=en");
        exit;
    }
    

    


    public static function error()
    {
        echo "error";
    }
}
