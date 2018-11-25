<?php

function loadController($controller)
{
    $controlador = ucwords($controller);
    $strFileController = 'application/controllers/' . $controlador . '.php';

    if (!is_file($strFileController)) {
        $strFileController = 'application/controllers/' . ucwords(DEFAULT_CONTROLLER) . '.php';
    }

    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}

function loadData($data)
{    
    $cont=0;
    $cntObj=null;
    foreach ($data as  $value) 
    {
        $cont++;        
        if($cont>2)
        {
            echo "Param ".$value;
        }
        if($cont==1)
        {
            $cntObj=loadController($value);            
        }        
        if($cont==2 && $cntObj!=null)
        {
            launch($cntObj,$value);            
        }
    }
}

/*Carga la accion del controlador seleccionado
* ControllerObj: Funcion del controlador
* Action: Nombre de la accion o funcion
*/
function loadAction($controllerObj, $action)
{    
    $accion = $action;
    $controllerObj->$accion();    
}

/*Realiza el llamdo al controlador seleccionado*/
function launch($controllerObj,$action)
{    
    if ($action!=null && method_exists($controllerObj, $action)) {
        loadAction($controllerObj, $action);
    } else {
        loadAction($controllerObj, DEFAULT_ACTION);
    }
}
?>