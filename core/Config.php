<?php
                                    /** CLASSE SINGLETON */

   namespace Core ;
    /**
     * @author Mamadou Niakaté
     * Class Config
     */
    class Config
    {
        private $settings = [] ;
        private static $_instance ;

        /** initialiser le tableau de configuration avec le contenu d'un fichier */
        private function __construc($file)
        {
            $this->settings = require($file) ;
        }

        /** instancier une seule fois la classe Config */
        public static function getInstance($file)
        {
            if(self::$_instance === null)
            {
                self::$_instance = new Config() ;
            }

            return self::$_instance ;
        }

        /** retourner un element du tableau de configuration */
        public function get($key)
        {
            if(!isset($this->settings[$key]))
            {
                return null ;
            }
            return $this->settings[$key] ;
        }
    }
?>