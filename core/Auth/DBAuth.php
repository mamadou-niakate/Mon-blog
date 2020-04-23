<?php
    namespace Core\Auth ;

    use Core\Database\Database ;

    class DBAuth
    {
        private $db ;
        
        public function __construct(Database $db)
        {
            $this->db = $db ;
        }

        public function getUserId()
        {
            if($this->logged())
            {
                return $_SESSION['auth'] ;
            }
        }
        /**
         * vérifier si l'utilisateur peut se connecter
         * @param $username
         * @param $password
         * @return boolean
         */
        public function login($username, $password)
        {
            $user = $this->db->prepare("SELECT * FROM users WHERE username = ? ", [$username],null,true);            

            if(password_verify($password,$user->password))
            {
                $_SESSION['auth'] = $user->id ;
                return true ;
            }
            return false ;
        }

        /**
         * vérifier si l'utilisateur est connecté
         * @return boolean
         */
        public function logged()
        {
            return isset($_SESSION['auth']) ;

        }
    }