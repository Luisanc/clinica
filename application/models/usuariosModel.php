<?php

class usuariosModel extends coreModel
{
    private $table;

    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }

    public function crear($nombre,$apellido,$usrNom, $usrPass, $rol)
    {
        return $this->dataInsert("INSERT INTO `usuarios` (`idUsuario`, `nombres`, `apellidos`, `usrNombre`, `usrPass`, `tipo`) VALUES (NULL, '".$nombre."', '".$apellido."', '".$usrNom."', '".$usrPass."', '".$rol."')");        
    }
}