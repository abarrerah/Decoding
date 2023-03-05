<?php

class Model {
    public function loadModel($model){
        $model = ucwords($model);
        if(is_file("models/{$model}.php")){
            require_once "models/{$model}.php";
            if(class_exists($model)){
                return new $model();
            }else{
                die("Undefined {$model} Model");
            }
        }
    }
}