<?php
include_once('DataBase.class.php');
class LoginModel extends  DataBase
{
    protected function CheckValidy($email,$pwd){
        $query = "SELECT * FROM users WHERE Email =?;";
        $statement = $this->connect()->prepare($query);
        if(!$statement->execute(array($email))){
            $statement=null ;
            header("location : ../signin.php?error=stmtfailed");
            exit();
        }
        $rstOfChecking ;
        $row = $statement->fetchAll();
        if(count($row)>0){
            $hashedPwd = $row[0]['Password'];
            $pwdVerify= password_verify($pwd,$hashedPwd); // return true if valid
            if(!$pwdVerify){
                $statement=null ;
                $rstOfChecking=false;
                $row="incorrectPwd";
                //header("location : ../signin.php?error=IncorrectPwd");
                //exit();
            }else{
                $rstOfChecking=true;   // valid ligin
            }
        }else{
            $rstOfChecking=false;
            $row="invalidEmail";
            $statement=null ;
            //header("location : ../signin.php?error=unmatch");
            //exit();
        }

        return array("valid"=>$rstOfChecking,"ass"=>$row);
    }
}