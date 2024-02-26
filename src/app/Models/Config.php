<?php
namespace App\Models;
class Config{
    protected array $config = [];
    public function __construct(array $env){
        $this->config = [
            'db' => [
                'host' => $env['DB_HOST'],
                'database' => $env['DB_DATABASE'],
                'username' => $env['DB_USER'],
                'password' => $env['DB_PASS']
            ]
        ];
    }
    

    public function __get($name){
        return $this->config[$name]  ?? null;
    }
}