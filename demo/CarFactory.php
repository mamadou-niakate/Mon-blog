<?php


class CarFactory
{
    public static function getCar($class_name)
    {
        $class_name = "Car".ucfirst($class_name) ;
        return new $class_name() ;
    }

}