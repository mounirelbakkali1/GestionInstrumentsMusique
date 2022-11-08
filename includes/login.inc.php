<?php
session_start();
if(isset($_POST['submit'])){
    // getting data
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    echo "hello";
    // instatiate user class
    include '../classes/LoginController.php';
    $userInfo = new LoginController($email,$password);

    // process Login
    $userInfo->ProcessLogin();

    echo $_SESSION['username'];
    // redirecting
    //header('location ../index.php');



}
