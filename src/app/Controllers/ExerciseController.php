<?php
namespace App\Controllers;

use App\Controllers\ViewController;

class ExerciseController{
    public function index(){
        return ViewController::make('Transaction',$this->details());
    }
    public function details(){
        $details = [];
        $fields = ['id', 'name', 'country', 'address', 'company', 'date', 'salary'];
        if (($handle = fopen(ROOT.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR."csv_file.csv", "r")) !== FALSE) {
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