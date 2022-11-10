<?php
include_once('../classes/Instrument.class.php');
if(isset($_POST['column'])&& isset($_POST['id']) &&isset($_POST['data'])){
    $instrument = new Instrument();
    $column = $_POST['column'];
    $id = intval($_POST['id']);
    $data = $_POST['data'];
    $instrument->updateInstrument($column,$data,$id);

}
if (isset($_POST['addInstBtnForm'])){
    $image = $_FILES['image'];
    $imageName =$_FILES['image']['name'];
    $imageTmpName = $_FILES['image'] ['tmp_name'] ;
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image'] ['type'];
    $tabExt =explode('.',$imageName);
    $imageExt=strtolower(end($tabExt)); // end :because we have array returned from spliting
    $extAllowed=array("jpg","jpeg","png");
    if(in_array($imageExt,$extAllowed)){
        if($imageError==0){
            $newUniqueNam= uniqid('',true).".".$imageExt;
            $file_distination='includes/InstrumentsImages/';
            move_uploaded_file($imageTmpName,$file_distination);
        }else{
            echo "error while uploading this file TRY AGAIN !";
        }
    }else{
        echo $imageExt."<br>";
        echo "can not upload file of this extention ! (only jpg,jpeg,png allowed )";
    }

}
?>

