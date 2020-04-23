<?php
    require "CarFactory.php" ;
    require "Car4x4.php" ;
    require "CarRenault.php" ;


    var_dump(CarFactory::getCar("4x4"));
    var_dump(CarFactory::getCar("renault"));
    var_dump(CarFactory::getCar("4x4"));
    var_dump(CarFactory::getCar("4x4"));
    var_dump(CarFactory::getCar("4x4"));


?>