<?php
namespace App\Controllers;

class ExerciseController{
    public function index(){
        echo Controller::make('Transaction',$this->details());
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