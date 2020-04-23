<?php

namespace Core\Table ;

use Core\DataBase\DataBase;
use Core\DataBase\MysqlDataBase ;

class Table
{
    protected $table ;
    protected $db ;
    function __construct(DataBase $dataBase)
    {
        $this->db = $dataBase ;

        if(is_null($this->table))
        {
            $splitName = explode("\\",get_class($this)) ;
            $class_name = end($splitName) ;
            $this->table = strtolower(str_replace("Table","",$class_name)) . 's' ;
        }
    }

    public function all()
    {
        return $this->query("SELECT * FROM ".$this->table) ;
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?",[$id],true);
    }

    public function query($statement,$attributes = null,$one = false)
    {
        if($attributes)
        {
            return $this->db->prepare($statement,
                               $attributes,
                               str_replace('Table','Entity',get_class($this)),
                               $one
                        );
        }else
        {
            return $this->db->query($statement,
                             str_replace('Table','Entity',get_class($this)),
                             $one
                        );
        }
    }
    
    public function listRecords($key,$value)
    {
        $records = $this->all() ;

        $return = [] ;

        foreach ($records as $v) 
        {
            $return[$v->$key] = $v->$value ;
        }
        return $return ;
    }

    public function update($id,$donnees)
    {
        $sql_parts  = [] ;
        $attributes = [] ;

        foreach ($donnees as $data => $value) 
        {
            $sql_parts [] = "$data = ?" ;
            $attributes[] = $value ;
        }

        $attributes[] = $id ;
        $sql_part = implode(',',$sql_parts) ;
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?",$attributes,true);
    }

    public function create($donnees)
    {
        $sql_parts  = [] ;
        $attributes = [] ;

        foreach ($donnees as $data => $value) 
        {
            $sql_parts [] = "$data = ?" ;
            $attributes[] = $value ;
        }

        $sql_part = implode(',',$sql_parts) ;
        return $this->query("INSERT INTO {$this->table} SET $sql_part",$attributes,true);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table}  WHERE id = ?",[$id],true);
    }
}