<?php
include_once('SignupModel.php');
session_start();
class signupController extends SignupModel
{
    private $f_name;
    private $s_name;
    private $email;
    private $pwd;
    private $pwd_confirm;


    public function __construct($f_name,$s_name,$email,$pwd,$pwd_confirm)
    {
        $this->f_name=$f_name;
        $this->s_name=$s_name;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->pwd_confirm=$pwd_confirm;
    }

    public function getInfo(){
        $empty = $this->ExistRecords();
        return "$this->s_name $this->f_name $this->email $this->pwd ----Exist : $empty";
    }

    public function ProcessSignUp(){
        $check;
        if($this->emptyInputs()==false){
            $check=" Please fill all fields";
        }elseif ($this->invalidEmail()==false){
            $check=" Email format is invalid";
        }elseif ($this->unmatchedpwd()==false){
            $check=" Unmatch password & password confirmation";
        }elseif ($this->ExistRecords()==false){
            $check=" Email already Signed up try to log in instead or create new one";
        }else{
            $this->createUser($this->f_name,$this->s_name,$this->email,$this->pwd);
            $check=true;
        }
        return $check;
    }
    public function emptyInputs(){
        $check;
        if(empty($this->f_name)|| empty($this->s_name) || empty($this->email) || empty($this->pwd)){
            $check=false;
        }else{
            $check =true ;
        }
        return $check;
    }
    public function invalidEmail(){
        $check;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $check=false;
        }else{
            $check =true ;
        }
        return $check;
    }
    public function unmatchedpwd(){
        $check;
        if($this->pwd != $this->pwd_confirm){
            $check=false;
        }else{
            $check =true ;
        }
        return $check;
    }
    public function ExistRecords(){
        $check;
        if(!$this->checkInputs($this->email)){
            $check=false;
        }else{
            $check =true ;
        }

        return $check;
    }



}