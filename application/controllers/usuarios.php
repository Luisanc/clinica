<?php

class usuarios extends coreController
{
    public $adapter;
    private $model;
    private $data;

    public function __construct()
    {
        parent::__construct();

        $this->model=new usuariosModel($this->adapter);        
    }

    public function index()
    {                
        if (isset($_SESSION['tipo'])) 
        {
            $this->loadView('private/admin-usuarios',array('titulo'=>'Registro','style'=>'add-user'));        
        }               
        else
        {
            //$this->loadView('public/login',array('titulo'=>'Login','style'=>'login'));
            $this->redirect("login");
        } 
    }
    
    
    public function crearUsuario()
    {                             
        $res=$this->model->crear($_POST['nombre'],$_POST['apellido'],$_POST['usrNombre'],$_POST['usrPass'],$_POST['rol']);
        
        if($res==true)
        {
            $this->redirect("home");
        }
        //var_dump($res);
    }
}