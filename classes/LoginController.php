<?php
session_start();
include_once('LoginModel.php');
class LoginController extends LoginModel
{
    private $email;
    private $pwd;

    public function getInfo(){
        return "Email : <br> Password : <br> $this->email $this->pwd ";
    }
    public function __construct($email,$pwd)
    {
        $this->email=$email;
        $this->pwd=$pwd;
    }
    public function ProcessLogin(){
        $returnOfProcessing = $this->CheckValidy($this->email,$this->pwd);
        $ass = $returnOfProcessing['ass'];
        if($returnOfProcessing['valid']){
            $status = $ass[0]['isApproved'];
            if($status==0){
                header('location: ../signin?err=notAllowedYet');
            }elseif ($status==1){
                $_SESSION['userInfo']= $ass[0]; // $ass is two dimentional array
            }
            //echo "I am here";
        }else{
            // email not exist
            $errType = $ass;
            header('location: ../signin?err='.$errType);
        }
    }

}