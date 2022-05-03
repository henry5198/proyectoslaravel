<?php

namespace App\Http\Custom;

    class Login{
        private $nameuser = "";
        private $password = "";

        public function __construct($nameuser, $password)
        {
            $this->nameuser = $nameuser;
            $this->password = $password;
        }

        public function getNameUser(){
            return $this->nameuser;
        }

        public function getPassword(){
            return $this->password;
        }
    }
?>