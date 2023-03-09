<?php
    class BDD {
        private $_bdd;
        private static $_instance;

        public static function getInstance() {
            if(empty(self::$_instance)) {
                self::$_instance = new BDD();
            }
            return self::$_instance->_bdd;
        }

        public function __contruct($config) {
            $this->_bdd = new PDO('mysql:dbname=' . $config->database->dbname . ';host=' . $config->database->host, $config->database->user,$config->database->password);
        }
        public function getBdd() {
            return $this->_bdd;
        }
    }