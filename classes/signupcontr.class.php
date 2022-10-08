<?php

class SignUpContr {

    private $user;
    private $email;
    private $password;
    private $password2;


    public function __construct($user, $email, $password, $password2){
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
    }

    private function emptyInput(){
        $result;

        if(empty($this->user || empty($this->email) || empty($this->password) || empty($this->password2))){
            $result = false;

        } else {
            $result = true;
        }

        return $result;
    }


    private function invalidUid(){
        $result;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->user)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    private function invalidEmail(){
        $result;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }

        else {
            $result = true;
        }

        return $result;
    }

    private function passMatch(){
        $result;

        if($this->password !== $this->password2){
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

}