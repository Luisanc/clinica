<?php

class loginModel extends coreModel
{
    private $table;

    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }

    public function getUserdata($user, $pass)
    {
        return $this->ejecutarSql("Select * from ".$this->table." where usrNombre = '".$user."' and usrPass = '".$pass."'");
    }
    
}