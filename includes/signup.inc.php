<?php

if(isset($_POST['submit'])){

    // Get data from the form
    $user = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Instantiate SignUpControl class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signupcontr.class.php";

    $signup = new SignUpContr($user, $email, $password, $password2);

    $signup->signUpUser();

    header("location: ../index.php?error=none");


}