<?php

namespace App\model;

use PDO;
use PDOException;

class BaseModel {
    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=localhost; dbname=shop;charset=utf8",'root','');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            throw $e;
        }
    }
    //hàm lấy toàn bộ dữ liệu
    public static function all(){
        $model = new static;
        $sqlBuilder = "SELECT * FROM ". $model->tableName;
        $stmt = $model->conn->prepare($sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

