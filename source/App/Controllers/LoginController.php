<?php

namespace Source\App\Controllers;

use League\OAuth2\Client\Provider\Facebook;
use League\OAuth2\Client\Provider\FacebookUser;
use League\OAuth2\Client\Provider\Google;

class LoginController
{
    public static function login($provider){
        
        if($provider == "google"){
            LoginController::loginGoogle();
        }else if($provider == "facebook"){
            LoginController::loginFacebook();
        }
    }
    public static function loginGoogle()
    {
       /*
    * AUTH GOOGLE
    */
    $google = new Google(GOOGLE);
    $authUrl = $google->getAuthorizationUrl();

    $error = filter_input(INPUT_GET, "error", FILTER_UNSAFE_RAW);
    $code = filter_input(INPUT_GET, "code", FILTER_UNSAFE_RAW);
     
    if ($error) {
        echo "<h3>Você precisa autorizar para contínuar!</h3>";
    }
     
    if ($code) {
        $token = $google->getAccessToken("authorization_code", [
        "code" => $code
        ]);
        
        $_SESSION['userLogin'] = serialize($google->getResourceOwner($token));
        header("Location: " . GOOGLE["redirectUri"]);
        exit;
    }
      header("Location: " . $authUrl);
    }

    public static function loginFacebook()
    { 
        $facebook = new Facebook(FACEBOOK);
        $authUrl = $facebook->getAuthorizationUrl([
            'scope' => 'email'
        ]);

        header("Location: " . $authUrl);
       
    }
}