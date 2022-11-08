<?php
session_start();
include_once('LoginModel.php');
class LoginController extends LoginModel
{
    private $email;
    private $pwd;


    public function __construct($email,$pwd)
    {
        $this->email=$email;
        $this->pwd=$pwd;
    }
    public function ProcessLogin(){
        $returnOfProcessing = $this->CheckValidy($this->email,$this->pwd);
        if($returnOfProcessing['valid']){
            $ass = $returnOfProcessing['statement']->fetchAll();
            $_SESSION['username']= $ass[0]['Second_Name']." ".$ass[0]['First_Name'];
        }else{
            header('location: ../signin?err=invalid');
        }
    }

}