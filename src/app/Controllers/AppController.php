<?php
namespace App\Controllers;

use PDO;
use App\Router;
use App\Controllers\ViewController;
use App\Exceptions\RouteNotFoundException;
use App\Models\Config;
use App\Models\DB;

class AppController{
    private static DB $db;
    public function __construct(protected Router $router, protected array $request, protected Config $config){
        static::$db = new DB($config->db ?? []);
    }

    public static function db():DB{
            return static::$db;
    }

    public function run(){
        try{
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        
        }catch(RouteNotFoundException $e){
            http_response_code(404);
            echo ViewController::make("Errors/404");
        } 
    }
}