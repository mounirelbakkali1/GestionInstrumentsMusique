<?php
if(isset($_POST['submit'])){
    // getting data
    $email = $_POST['email'];
    $password = $_POST['pwd'];


    //echo "hello";
    // instatiate user class
    include '../classes/LoginController.php';
    $userInfo = new LoginController($email,$password);
    //echo $_SESSION['username'];

    //echo $userInfo->getInfo();
    // process Login
    $userInfo->ProcessLogin();
    //if(isset($_POST['keep_me_connected'])){
      //  setcookie("user_ID", $_SESSION['userInfo']['ID'], time() + (86400 * 30), "/"); // 86400 = 1 day
    //}

    // redirecting
    echo "<script>window.location.replace('../index.php')</script>";

    ///  header('Location ../index.php');    <--------- it doesn't work !



}
