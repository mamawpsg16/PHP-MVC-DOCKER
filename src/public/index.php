<?php

declare(strict_types=1);
namespace App;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Controllers\Controller;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ExerciseController;
use App\Exceptions\RouteNotFoundException;

session_start();

// Include Composer autoloader
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'constants.php';
require_once __DIR__ . '/../vendor/autoload.php';

try{

    $router = new Router();
    
    $router->get('/',[HomeController::class, 'index'])
            ->get('/download',[HomeController::class, 'download'])
            ->get('/upload',[HomeController::class, 'upload'])
            ->post('/upload',[HomeController::class, 'storeUpload'])
            ->get('/transactions',[ExerciseController::class, 'index'])
    ->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

}catch(RouteNotFoundException $e){
    http_response_code(404);
    echo Controller::make("Errors/404");
} 
