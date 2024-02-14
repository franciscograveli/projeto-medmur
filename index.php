<?php
ob_start();
session_start();
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/source/Router/Router.php";
use Source\App\Controllers\AuthController;
use Source\App\Controllers\HomeController;

$router = new Router();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['provider'])) {
    
    $provider = $_POST['provider'];
    if ($provider == "logout") {
        AuthController::logout();
        exit;
    }
    if ($provider) {
        $_SESSION['provider'] = $provider;
        AuthController::login($provider);
        exit;
    } else {
        header("Location: /error");
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['userLogin']) {
    header('Content-Type: application/json');
    echo HomeController::getSessionData();
    exit; 
}

$router->get('', [HomeController::class, 'index']);
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->dispatch();

ob_end_flush();