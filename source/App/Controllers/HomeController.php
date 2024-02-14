<?php

namespace Source\App\Controllers;

use Source\App\Controllers\AuthController;

class HomeController
{
    public static function index($user=null)
    {
        if (empty($_SESSION['userLogin'])) {
            
            include __DIR__ . "/../Views/login.php";
            exit;
        } else {
            include __DIR__ . "/../Views/main.php";
            exit;
        }
    }

    public static function getSessionData($teste = null){
        if(!empty($_SESSION['userLogin'])){
            $user = unserialize($_SESSION['userLogin']);
            $userData = [
                'avatar' => $user->getAvatar(),
                'sub' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'locale' => $user->getLocale(),
            ];
        
            return json_encode($userData);
            
        }else{
            return json_encode(array('error' => 'session vazia'));
        }
    }
    
}
