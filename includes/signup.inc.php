<?php

if(isset($_POST['submit'])){
    // getting data
    $first_name = $_POST['f_name'];
    $second_name = $_POST['s_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_confirm = $_POST['pwd_confirm'];
    $keep_connected = $_POST['keep_connected'];


    // instatiate user class
    include '../classes/SignupController.php';
    $userInfo = new SignupController($first_name,$second_name,$email,$password,$password_confirm);
    echo $userInfo->getInfo();
    // Processing Regestration
    $userInfo->ProcessSignUp();
    //REDIRECTING
    //header('location: Components/pending.components.php');
    header('location: ../signin.php');



}




