<?php
    class User {
        private $id;
        private $mail;
        private $password;

        public function __construct($datasource) {
            parent::__construct("user","User",$datasource);
        }
    }