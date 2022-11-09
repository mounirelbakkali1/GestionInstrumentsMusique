<?php
include_once('DataBase.class.php');
class Instrument extends DataBase
{
    public function getInstruments(){
        $query = "SELECT instruments.*,categories.Name As category FROM instruments INNER JOIN categories on instruments.Category_ID = categories.ID";
        $statement = $this->connect();
        $rstOfExc= $statement->query($query);
        if(!$rstOfExc){
            header("location : ../index.php?err=statmentFailed");
            exit();
        }
        $rows = $rstOfExc->fetchAll();
        return $rows;

    }

}