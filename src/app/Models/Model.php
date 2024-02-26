<?php

namespace App\Models;

use App\Controllers\AppController;

class Model
{
    protected $db;
    public function __construct(){
        $this->db = AppController::db();
    }
}
