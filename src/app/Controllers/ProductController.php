<?php
namespace App\Controllers;

use App\Controllers\ViewController;
use App\Models\Product;

class ProductController
{
    public function __construct(){

    }
    public function index()
    {
        $data  = (new Product())->all();
        return ViewController::make('Product/index', ['data' => $data]);
    }

    public function create()
    {
        return ViewController::make('Product/create');
    }
    public function store()
    {
       (new Product())->store($_POST);

       header('Location:/products');
       exit;
    }

    public function show(int $id){
    }

    public function destroy(){
        $id = isset($_POST['id']) ? intval($_POST['id']) : null;
        var_dump($id);
        // Validate the data (you might want to perform more thorough validation)
        if ($id <= 0) {
            // Handle validation error, e.g., redirect back with an error message
            echo 'Validation error: Invalid product ID.';
            return;
        }
    }
}