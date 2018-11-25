<?php

$route['home']='usuarios/index';

//Formulario de registro
$route['inicio']='usuarios/index';

//Formulario de registro
$route['registro']='usuarios/index';

$route['crear']='usuarios/crearUsuario';

//Formulario login dominio
$route['login']='login/index';

//Accion logueo
$route['acceso']='login/login';

//Accion adios
$route['logout']='login/logOut';