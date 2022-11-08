<?php
include_once('DataBase.class.php');
class LoginModel extends  DataBase
{
    protected function CheckValidy($email,$pwd){
        $query = "SELECT * FROM users WHERE Email =?;";
        $statement = $this->connect()->prepare($query);
        if($statement->execute(array($email))){
            $statement=null ;
            header("location : ../signin.php?error=stmtfailed");
            exit();
        }
        $rstOfChecking ;
        if($statement->columnCount()>0){
            // HERE :  need to check if password are the same
            $ass = $statement->fetchAll();
            $hashedPwd = $ass[0]['Password'];
            $pwdVerify= password_verify($pwd,$hashedPwd);
            if(!$pwdVerify){
                $statement=null ;
                header("location : ../signin.php?error=IncorrectPwd");
                exit();
            }else{
                $rstOfChecking=true;   // valid ligin
            }
        }else{
            $statement=null ;
            header("location : ../signin.php?error=unmatch");
            exit();
        }
        return array("valid"=>$rstOfChecking,"statement"=>$statement);
    }
}