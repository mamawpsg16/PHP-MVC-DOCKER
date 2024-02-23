<?php
namespace App\Controllers;
class UserController extends Controller
{
    public function index()
    {
        echo Controller::make('User.php');
    }
}