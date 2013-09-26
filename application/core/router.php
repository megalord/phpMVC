<?php

class router{
    
    public $controller;
    public $method;
    public $parameters;
    
    # get the controller, method, and parameters from the url
    public function parseUrl(){
        $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
        $this->controller = !empty($url[0]) ? $url[0] : null;
        $this->method = !empty($url[1]) ? $url[1] : 'index';
        if(!empty($url[2])){
            $this->parameters = !empty($url[3]) ? array_slice($url, 2) : $url[2];
        }else{
            $this->parameters = null;
        };
    }
    
    # see if the given controller exists
    public function lookup($controller, $method){
        if(!empty($controller) && file_exists(applicationPath.'/controllers/'.$controller.'.php')){
            require_once(applicationPath.'controllers/'.$controller.'.php');
            if(method_exists($controller, $method) && is_callable([$controller, $method])){
                return true;
            }else{
                return false;
            };
        }else{
            return false;
        };
    }
    
}

?>