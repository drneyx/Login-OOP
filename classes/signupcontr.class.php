<?php

class SignUpContr extends SignUp {

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


    public function signUpUser(){
        if($this->emptyInput() == false){
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        if($this->invalidUid() == false){
            header('location: ../index.php?error=invaliduser');
            exit();
        }

        if($this->invalidEmail() == false){
            header('location: ../index.php?error=email');
            exit();
        }

        if($this->passMatch() == false){
            header('location: ../index.php?error=password');
            exit();
        }


        if($this->userExists() == false){
            header('location: ../index.php?error=userexists');
            exit();
        }

        $this->setUser($this->user, $this->email, $this->password);
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

    private function userExists(){
        $result;

        if(!$this->checkUser($this->user, $this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
 
        return $result;
    }


}