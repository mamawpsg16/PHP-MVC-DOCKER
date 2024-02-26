<?php
namespace App\Models;

use PDO;
use PDOException;

class DB{
    private PDO $pdo;
    public function __construct(array $config){
        try {
            $this->pdo = new PDO("mysql:host=".$config['host'].";dbname=".$config['database'], $config['username'],$config['password'],[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function __call(string $name, array $args){
        return call_user_func_array([$this->pdo, $name], $args);
    }
}