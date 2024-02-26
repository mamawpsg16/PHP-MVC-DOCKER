<?php
namespace App\Controllers;

use App\Controllers\ViewController;

class UserController
{
    public function index()
    {
        return ViewController::make('User.php');
    }
}