<?php

namespace App\controllers;

use App\model\ProductModel;

class HomeController extends Controller {
    public function index(){
        $product = ProductModel::all();
        return $this->view('home.index', ['product'=>$product]);
    }
    public function show(){
        $id = $_GET['id'] ?? null;
        if (!$id){
            header("location: /home");
            die;
        }
        $product = ProductModel::find($id);
        if (!$product){
            header("location: /home");
            die;
        }
        return $this->view('home.show', ['product'=>$product]);
    }
}