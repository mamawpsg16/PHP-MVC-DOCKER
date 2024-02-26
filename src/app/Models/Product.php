<?php
namespace App\Models;

use PDO;
use PDOException;


class Product extends Model{

    public function all(){
        $sql = "SELECT id, name, description FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        // Return the last inserted ID
        return $data;
    }
    public function store(array $data){
        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO products (name, description) VALUES (:name, :description)";
            //code...
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $data['description'] ?? null, PDO::PARAM_STR);
            $stmt->execute();

            $id = (int)$this->db->lastInsertId();
        
            $this->db->commit();

            // Return the last inserted ID
            return $id;
        } catch (PDOException $pdoException) {
            if($this->db->inTransaction()){
                $this->db->rollback();
            }
        }
    }
}