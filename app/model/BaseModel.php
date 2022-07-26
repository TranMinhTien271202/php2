<?php

namespace App\model;

use PDO;
use PDOException;

class BaseModel
{
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost; dbname=shop;charset=utf8", 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    //hàm lấy toàn bộ dữ liệu
    public static function all()
    {
        $model = new static;
        $sqlBuilder = "SELECT * FROM " . $model->tableName;
        $stmt = $model->conn->prepare($sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public static function find($id)
    {
        $model = new static;
        $sqlBuilder = "SELECT * FROM " . $model->tableName . " where id=$id";
        $stmt = $model->conn->prepare($sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result[0];
    }
    public function insert($arr)
    {
        $this->queryBuilder = "INSERT INTO " . $this->tableName;
        $cols = " (";
        $params = " (";
        foreach ($arr as $key => $value) {
            $cols .= "$key,";
            $params .= ":$key,";
        }
        // xóa dấu phẩy bên phải
        $cols = rtrim($cols, ",") . ") ";
        $params = rtrim($params, ",") . ")";
        // nối vào trong chuỗi queryBuilder
        $this->queryBuilder.= $cols. "VALUE" . $params;
        $stmt = $this->conn->prepare($this->queryBuilder);
        $stmt->execute($arr);
    }
    public function update($arrs){
        $this->queryBuilder = "UPDATE " . $this->tableName . " SET ";
        foreach ($arrs as $key=>$value){
            $this->queryBuilder .= "$key=:$key, ";
        }
        $this->queryBuilder = trim($this->queryBuilder, ", ");
        $this->queryBuilder .= " WHERE id=:id";
        //thêm id vào mảng
        $arrs['id'] = $this->id;

        $stmt = $this->conn->prepare($this->queryBuilder);
        $stmt->execute($arrs);
    }
}
