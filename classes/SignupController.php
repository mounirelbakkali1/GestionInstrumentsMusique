<?php
include_once('SignupModel.php');

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
        $empty = $this->emptyInputs();
        return "$this->s_name $this->f_name $this->email $this->pwd ----$empty";
    }

    public function ProcessSignUp(){
        if($this->emptyInputs()==false && $this->invalidEmail()==false && $this->unmatchedpwd()==false && $this->ExistRecords()==false){
            // end process with error handling
        }else{
            $this->createUser($this->f_name,$this->s_name,$this->email,$this->pwd);
        }
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
        if(filter_var($this->email,FILTER_VALIDATE_EMAIL)){
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
        if($this->checkInputs($this->email,$this->pwd)){
            $check=false;
        }else{
            $check =true ;
        }
        return $check;
    }



}