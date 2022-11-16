<?php
if(isset($_POST['submit'])){
    // getting data
    $first_name = $_POST['f_name'];
    $second_name = $_POST['s_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_confirm = $_POST['pwd_confirm'];
    // instatiate user class
    include '../classes/SignupController.php';
    $userInfo = new SignupController($first_name,$second_name,$email,$password,$password_confirm);
    echo $userInfo->getInfo();
    $userInfo->getInfo()."<br>";
    // Processing Regestration
    $restOfChecking =$userInfo->ProcessSignUp();
    if($restOfChecking===true){
        header('location: ../signin.php');
    }else{
        $_SESSION['err-signup']=$restOfChecking;
        echo $restOfChecking;
        header('location: ../signup.php');
    }
    //REDIRECTING
    //header('location: Components/pending.components.php');




}




