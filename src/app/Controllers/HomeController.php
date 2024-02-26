<?php
namespace App\Controllers;

use App\Controllers\AppController;
use App\Controllers\ViewController;
use App\Services\InvoiceService;

class HomeController
{

    public function index()
    {
        // $db = AppController::db();
        // try {
        //     $db->beginTransaction();

        //     $db->commit();
        // } catch (\Throwable $th) {
        //     if($db->inTransaction()){
        //         $db->rollBack();
        //     }
        //     //throw $th;
        // }


        return ViewController::make('Home');
    }

    public function upload(){
        return ViewController::make('Upload');
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
    public function store(){
        $file_path = STORAGE.$_FILES['image']['name'];
        var_dump($_FILES, $file_path, ROOT);
        move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
        // $this->uploadData($file_path);
        // header("Location: /");
        
        // exit;
    }

    public function uploadData($file){

        $details = [];
        $fields = ['id', 'name', 'country', 'address', 'company', 'date', 'salary'];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 500, ",")) !== FALSE) {
                $row = array_combine($fields, $data);
                array_push($details, $row);
            }
            fclose($handle);
        }
        $new_details = array_slice($details,1);
        return ['products' => $new_details];
    }
}