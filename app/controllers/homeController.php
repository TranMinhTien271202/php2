<?php

namespace App\controllers;

use App\model\ProductModel;

class HomeController extends Controller {
    public function index(){
        $product = ProductModel::all();
        return $this->view('home.index', ['product'=>$product]);
    }
}