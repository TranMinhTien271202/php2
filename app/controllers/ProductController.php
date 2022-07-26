<?php

namespace App\controllers;

use App\model\CategoryModel;
use App\model\ProductModel;

class ProductController extends Controller {
    public function Pro(){
        $product = ProductModel::all();
        $category = CategoryModel::all();
        return $this->view('product.product', ['product'=>$product, 'category'=>$category]);
    }
    public function add(){
        $arr = [
            'name' => 'tien 111',
            'image'=> '1a.jpg',
            'cate_id'=>'2',
            'price'=>6000011,
            'short_desc' => '111aaaaaaaaa',
            'detail' => 'b1111bbbbbbbbbbbbbb'
        ];
        // $product = new ProductModel;
        // $product-> insert($arr); //hàm thêm

        ProductModel::find(111)->update($arr);
        return $this->view('product.product');
    }
}