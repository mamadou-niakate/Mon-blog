<?php
	namespace Core\DataBase  ;
	use \PDO ;

	/**
	 * @author Niakaté Mamadou
     * Classe permettant la connexion à la base des données
	 */
	class MysqlDataBase extends DataBase
	{
        private $db_name ;
        private $db_user ;
        private $db_pass ;
        private $db_host ;
		private $pdo     ;

		function __construct($db_name,$db_user="root",$db_pass="OUwankte20..",$db_host="localhost")
		{
			$this->db_name = $db_name ;
			$this->db_user = $db_user ;
			$this->db_pass = $db_pass ;
			$this->db_host = $db_host ;
		}

		private function getPDO()
        {
             //$pdo = new PDO($this->db_name,$this->db_host,$this->db_user,$this->db_pass) ;
            if($this->pdo === null)
            {
                $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'OUwankte20..') ;
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ;
                $this->pdo = $pdo ;
            }
            return $this->pdo ;
        }

        public function query($statement,$classe_name = null,$one=false)
        {
            $req = $this->getPDO()->query($statement) ;

            if(strpos($statement,'UPDATE')===0 || strpos($statement,'INSERT')===0 || strpos($statement,'DELETE')===0)
            {
                return $req ;
            }
            
            if($classe_name === null)
            {
                $data = $req->setFetchMode(PDO::FETCH_OBJ) ;
            }else
            {
                $data = $req->setFetchMode(PDO::FETCH_CLASS,$classe_name) ;
            }

            if($one)
            {
                $data = $req->fetch() ;
            }else
            {
                $data = $req->fetchAll() ;
            }
            return $data ;
        }


        public function prepare($statement,$attributes,$classe_name=null,$one=false)
        {
            $res = $this->getPDO()->prepare($statement);
            $response = $res->execute($attributes) ;

            if(strpos($statement,'UPDATE')===0 || strpos($statement,'INSERT')===0 || strpos($statement,'DELETE')===0)
            {
                return $response ;
            }

            if($classe_name === null)
            {
                $data = $res->setFetchMode(PDO::FETCH_OBJ) ;
            }else
            {
                $data = $res->setFetchMode(PDO::FETCH_CLASS,$classe_name) ;
            }

            if($one)
            {
                $data = $res->fetch() ;
            }else
            {
                $data = $res->fetchAll() ;
            }
            return $data ;
        }

        public function lastInsertId()
        {
            return $this->getPDO()->lastInsertId() ;
        }
	}

?>