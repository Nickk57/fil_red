<?php
    class ErrorController {
        public function show($exception) {
            $this->addParam("exception",$exception);
            $this->view("error");
        }
    }