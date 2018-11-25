<?php

class coreController
{    

    public $adapter;
    public $dataUser;
    public $dominio;    

    public function __construct()
    {                
        require_once 'coreConection.php';
        require_once 'coreInits.php';
        require_once 'coreModel.php';
        require_once 'application/helpers/dominio.php';

        foreach(glob("application/models/*.php") as $file){
            require_once $file;
        }

        //Inicializa la conexion con la base de datos
        $this->conectar=new coreConection();
        $this->adapter=$this->conectar->startConexion();
        $this->dominio= new dominio();        
        session_start();
    }

    public function loadView($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor;
        }
        
        //$dataUser=$data;
        require 'application/views/templates/header.php';
        require_once 'application/views/'.$vista.'.php';
        require 'application/views/templates/footer.php';
    }

    /*Crea la accion y la url*/
    /*public function redirect($controlador=DEFAULT_CONTROLLER,$accion=DEFAULT_ACTION){
        header("Location:index.php?aplication/controllers=".$controlador."&action=".$accion);
    }*/
        
    public function redirect($dir){
        header("Location:".$dir);
    }

    public function nuevo($dato)
    {
        return $dato;
    }
}