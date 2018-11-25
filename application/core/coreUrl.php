<?php

class coreUrl
{

    private $routes;

    public function __construct()
    {
        require_once 'application/config/routes.php';
                        
        $this->routes=$route;
    }

    public function transformURL( $view ) 
    {        
        $val=['logsData','index'];
        foreach ($this->routes as $key => $value) {
            if($key==strtolower($view))
            {
                $val=explode("/", $value);
            }
        }
        
        return $val;
        
    }

    /*Url Builder*/
    public function url($controlador=DEFAULT_CONTROLLER,$accion=DEFAULT_ACTION){
        $urlString="index.php?aplication/controller=".$controlador."&action=".$accion;
        return $urlString;
    }
}