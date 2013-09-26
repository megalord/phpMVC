<?php

class baseController{
    
    protected $model;
    
    function __construct(){
        require_once('model.php');
        $this->model = new model;
    }
    
    public function loadView($view){
        if(is_array($view)){
            $view = implode('/', $view);
        };
        if(!file_exists(applicationPath.'views/'.$view)){
            $view = '404.html';
        };
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            require_once(applicationPath.'views/'.$view);
        }else{
            require_once(applicationPath.'views/index.php');
        };
	}
    
}

?>
