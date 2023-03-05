<?php 
class Controller {

    protected $render;

    public function __construct(){
        $this->render = new Render();
    }
    public function load($model){
        $mainMondel = new Model();
        return $mainMondel->loadModel($model);
    }
}