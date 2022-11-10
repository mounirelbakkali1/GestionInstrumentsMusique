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
    public function updateInstrument($column,$data,$id){
        //  var_dump($column);
        $sql = "UPDATE `instruments` SET $column='$data' WHERE ID=$id ";

        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }

    }
    public function getCategories(){
        $sql ="SELECT * FROM categories ;";
        try {
            $statm =$this->connect()->prepare($sql);
            $statm->execute();
            $rstOfExecution =$statm->fetchAll();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $rstOfExecution;
    }

}