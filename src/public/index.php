<?php

declare(strict_types=1);
namespace App;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Dotenv\Dotenv;
use App\Models\Config;
use App\Controllers\AppController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ExerciseController;

session_start();

// Include Composer autoloader
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'constants.php';
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->get('/',[HomeController::class, 'index'])
        ->get('/download',[HomeController::class, 'download'])
        ->get('/upload',[HomeController::class, 'upload'])
        ->get('/transactions',[ExerciseController::class, 'index'])
        ->get('/products',[ProductController::class, 'index'])
        ->get('/product/create',[ProductController::class, 'create'])
        ->post('/product',[ProductController::class, 'store'])
        ->get('/product/{id}',[ProductController::class, 'show'])
        ->post('/product/delete',[ProductController::class, 'destroy'])
        ->post('/upload',[HomeController::class, 'store']);

(new AppController($router,['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']], new Config($_ENV)))->run();

