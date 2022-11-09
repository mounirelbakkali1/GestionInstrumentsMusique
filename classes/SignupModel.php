<?php
include ('DataBase.class.php');
class SignupModel extends DataBase
{

    protected function checkInputs($email,$pwd){
        $query = "SELECT * FROM users_table WHERE EMAILS =? OR PASSWORDS =? ;";
        $statement = $this->connect()->prepare($query);
        if(!$statement->execute(array($email,$pwd))){
            $statement=null ;
            header("location : signup.php?error=stmtfailed");
            exit();
        }
        $rstOfChecking ;
        if($statement->columnCount()>0){
            $rstOfChecking=false;
        }else{
            $rstOfChecking=true;
        }
        return $rstOfChecking;
    }
    protected function createUser($f_name ,$s_name,$email,$pwd){
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        $query = "INSERT INTO users (First_Name,Second_Name,Email,Password,Role_id,IsApproved,SignUpAt) VALUES (?,?,?,?,?,?,?);";
        $statement = $this->connect()->prepare($query);
        $date =date("Y-m-d H:i:s");
        //$sign_up_date= date('Y-m-d H:i:s', $date);
        echo $date;
        if(!$statement->execute(array($f_name,$s_name,$email,$hashedPwd,1,0,$date))){
            $statement=null ;
            header("location : ../signup.php?error=stmtfailed");
            exit();
        }
    }
}