<?php
include_once 'DataBase.class.php';
class PendingUsers extends DataBase
{
    public function getPendingUsers(){
        $query = "SELECT * FROM users WHERE Role_ID=1;";
        $statement=$this->connect()->prepare($query);
        if(!$statement->execute()){
            $statement=null ;
            header("location : ../index.php?err=statmentFailed");
            exit();
        }
        $arr = $statement->fetchAll();
        return $arr;
    }
    public function giveAccess($userID){
        $sql = "UPDATE `users` SET isApproved='1' WHERE ID=?";
        $statement=$this->connect()->prepare($sql);
        if(!$statement->execute(array($userID))){
            $statement=null ;
            header("location : ../index.php?err=statmentFailed");
            exit();
        }
        return true;
    }
    public function removeAccess($userID){
        $sql = "UPDATE `users` SET isApproved='0' WHERE ID=?";
        $statement=$this->connect()->prepare($sql);
        if(!$statement->execute(array($userID))){
            $statement=null ;
            header("location : ../index.php?err=statmentFailed");
            exit();
        }
        return true;
    }


}