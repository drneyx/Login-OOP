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
}