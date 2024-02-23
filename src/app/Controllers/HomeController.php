<?php
namespace App\Controllers;

use PDO;
use App\Controllers\Controller;

class HomeController
{
    public function index()
    {
        $pdo = new PDO("mysql:host=db;dbname=larashop", 'user', 'password',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
      
        $name = 'Alibaba Charger';
        $description = null;
        try {
            // Some code that may throw an exception
            // $data = $pdo->prepare("INSERT INTO products (`name`, `description`) VALUES (:name, :description)");
            // $data->bindParam(':name', $name);
            // $data->bindParam(':description', $description);
            // $data->execute();
            // $query = 'SELECT * FROM products';
            // $result = $pdo->query($query);
            // var_dump($result->fetchAll());

            // $search = 'name';
            // $sql = "SELECT * FROM users WHERE $search = :email";
            // $stmt = $pdo->query($sql);
            // $results = $stmt->fetchAll();
            // var_dump($results);
        } catch (\PDOException $e) {
            // Handle the exception, you can access the error code using $e->getCode()
            $errorCode = $e->getCode();
            echo "Error Code: $errorCode\n";
            echo "Error Message: " . $e->getMessage() . "\n";
        }
        // $_SESSION['COUNT'] += 1;
        // setcookie("USERNAME",'mamawpsg16', time() + 10);
        echo (string)Controller::make('Home');
    }

    public function upload(){
        echo Controller::make('Upload');
    }

    public function download(){
        $imagePath = STORAGE.'fafaw.png';
        if (file_exists($imagePath)) {
            header('Content-Type: image/jpeg'); // Adjust the Content-Type based on your image format
            header('Content-Disposition: attachment; filename="image.jpg"');
            header('Content-Length: ' . filesize($imagePath));
    
            readfile($imagePath);
            exit;
        } else {
            // Handle the case where the image file does not exist
            echo "Image not found";
        }
    }
    public function storeUpload(){
        $file_path = STORAGE.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $file_path);

        header("Location: /");
        
        exit;
    }
}