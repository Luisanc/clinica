<?php

class coreModel extends coreInits
{
    private $table;
    private $fluent;

    public function __construct($gtable, $adapter) {
        $this->table=$gtable;
        $this->fluent=$adapter;
        parent::__construct($gtable, $this->fluent);
    }

    public function fluent(){
        return $this->fluent;
    }

    public function getTable(){
        return $this->table;
    }


    public function dataInsert($queryString)
    {
        $query=$this->db()->query($queryString);
        if($query==true)
        {
            if($query->rowCount()>1)
            {
                $resultSet = $query->fetchAll();                
            }            
            else
            {
                $resultSet=true;
            }
        }
        else
        {
            $resultSet=false;
        }

        return $resultSet;
    }

    /*Ejecuta Querys string*/
    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        //var_dump($query);
        if($query==true){
            if($query->rowCount()>1){
                $resultSet = $query->fetchAll();
                /*while($row = $query->fetch()) {
                    $resultSet[]=$row;
                }*/
            }
            else
            {
                if($query->rowCount()==1){

                    $resultSet = $query->fetch();                    
                }
                else
                {
                    $resultSet = false;
                }
            }                        
        }
        else{
            $resultSet=false;
        }

        return $resultSet;
    }
}