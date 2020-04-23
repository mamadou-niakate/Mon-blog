<?php
    namespace Core\Entity;

    class Entity
    {
        public function __get($key)
        {
            $methode = 'get'.ucfirst($key) ;
            if(method_exists($this,$methode))
            {
                $this->$key = $this->$methode() ;
            }
            return $this->$key ;
        }
    }