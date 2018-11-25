<?php 

    //Configuración global
    require_once 'application/config/config.php';

    //Base para los controladores
    require_once 'application/core/coreController.php';

    //Inicializa las url
    require_once 'application/core/coreUrl.php';

    //Funciones para el controlador frontal
    require_once 'application/core/coreMain.php';     

    $prueba= new coreUrl();

    if(isset($_GET['url']))
    {
        $url=$prueba->transformURL($_GET['url']);    
    }
    else
    {        
        $url=$prueba->transformURL('home');    
    }    

    //var_dump($url);
    loadData($url); 
    //phpinfo();