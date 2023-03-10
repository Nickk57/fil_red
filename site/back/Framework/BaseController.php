<?php
    class BaseController {
        private $_httpRequest;
        private $_param;
        private $_config;
        private $_FileManager;

        public function __construct($httpRequest,$config) {
            $this->_httpRequest = $httpRequest;
            $this->_config = $httpRequest;
            $this->_param = array();
            $this->addParam("httprequest",$this->_httpRequest);
            $this->addParam("config",$this->_config);
            $this->bindManager();
            $this->FileManager = new FileManager();
        }
        public function view($filename) {
            if(file_exists("view/" . $this->_httprequest->getRoute()->getController() . "/css/" . $filename . ".css")) {
                $this->addCass("view/" . $this->_httprequest->getRoute()->getController() . "/css/" . $filename . ".css");
            }
            if(file_exists("view/" . $this->_httprequest->getRoute()->getController() . "/js/" . $filename . ".js")) {
                $this->addCass("view/" . $this->_httprequest->getRoute()->getController() . "/js/" . $filename . ".js");
            }
            if(file_exists('view/' . $this->_httprequest->getRoute()->getController() . "/" . $filename . '.php')) {
                ob_start();
                extract($this->_param);
                include("view/" . $this->_httprequest->getRoute()->getController() . "/" . $filename . ".php");
                $content = ob_get_clean(); 
                include("view/layout.php");
            }
            else {
                throw new ViewNotFroundException();
            }
            
        }
        public function bindManager() {
            foreach($this->_httpRequest->getRoute()->getManager() as $manager) {
                $this->$manager = new $manager($this->_config->database);
            }
        }
        public function addParam($name,$value) {
            $this->_param[$name] = $value;
        }
        public function addCss($file) {
            $this->_fileManager->addCss($file);
        }
        public function addJs($file) {
            $this->_fileManager->addJs($file);
        }
    }