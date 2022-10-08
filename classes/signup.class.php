<?php

class SignUp  extends Dbh{


    protected function setUser($user, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_fullName, users_email, users_password) VALUES (?, ? , ?);');

        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($user, $email, $hashPwd))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

    protected function checkUser($user, $email){
        $stmt = $this->connect()->prepare("SELECT users_fullName FROM users WHERE users_fullName = ? OR users_email =?;");

        if(!$stmt->execute(array($user, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }

        else {
            $resultCheck = true;
        }

        return $resultCheck;

    }
}