<?php

namespace App\controllers;
class Controller{
    public function view($path, $data=[]){
        $path = str_replace('.' , '/',$path);
        include_once __DIR__ . "/../view/" . $path . ".php";
    }
}