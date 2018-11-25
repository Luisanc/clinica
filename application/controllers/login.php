<?php

class login extends coreController
{
    public $adapter;
    private $model;
    private $data;

    public function __construct()
    {
        parent::__construct();

        $this->model=new loginModel($this->adapter);        
    }

    public function index(){
        if(!isset($_SESSION['tipo']))
        {            
            $this->loadView('public/login',array('titulo'=>'Login','style'=>'login'));                 
        }        
        else
        {
            $this->redirect("registro");                        
        }
    }

    public function login()
    {       
        $response = null;         
        if(isset($_POST['usr']) && $_POST['usr']!="" && isset($_POST['pass']) && $_POST['pass']!="")
        {
            $usuario=$_POST['usr'];
            $password=$_POST['pass'];
            $response=$this->model->getUserdata($usuario,$password);
        }                 
            
        //var_dump($response);
        if($response!=null && $response!=false)
        {          
            //Logueado Correctamente  
            $_SESSION['nombre']=$response['nombres'];
            $_SESSION['tipo']=$response['tipo'];
            if($_SESSION['tipo']=='admin')
            {
                $this->redirect("registro");
            }
            if($_SESSION['tipo']=='medico')
            {
                $this->redirect("captura");
            }
            if($_SESSION['tipo']=='archivero')
            {
                $this->redirect("archivos");
            }
            else
            {
                $this->loadView('public/login',array('titulo'=>'Login','style'=>'login'));        
            }                               
        }
        else
        {
            //Usuario o Contraseña Incorrectos
            //var_dump($$response);
            $this->redirect("login");
        }
    }

    public function logOut()
    {
        unset($_SESSION['tipo']);
    }

}