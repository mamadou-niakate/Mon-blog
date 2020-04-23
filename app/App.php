<?php
use Core\DataBase\MysqlDataBase ;
use Core\Config ;

class App
{
    public $title = "Prog-Idea" ;
    private static $_instance ;
    private $db_instance ;

    public static function load()
    {
        session_start() ;

        require (ROOT.'/app/Autoloader.php') ;
        App\Autoloader::register() ;

        require ROOT.'/core/Autoloader.php' ;
        Core\Autoloader::register() ;
    }

    public static function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new App() ;
        }
        return self::$_instance ;
    }

    public function getTable($name)
    {
        $class_name = "\\App\\Table\\" . ucfirst($name) . "Table" ;
        return new $class_name($this->getDB()) ;
    }

    public function getDB()
    {
        $config = Config::getInstance(ROOT.'/config/config.php') ;

        if(is_null($this->db_instance))
        {
            $this->db_instance = new MysqlDataBase($config->get("db_name"),$config->get("db_user"),$config->get("db_pass"),$config->get("db_host")) ;
        }
        return $this->db_instance ;
    }

    public function forbiden()
    {
        header('HTTP/1.0 403 Fordiden') ;
        die('Accès interdit') ; 
    }

    public function noFound()
    {
        header('HTTP/1.0 404 Not Found') ;
        die('Page introuvale') ;    
    }
}