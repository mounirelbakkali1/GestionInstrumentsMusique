<?php
session_start();
include_once('../classes/Instrument.class.php');

if(isset($_POST['column'])&& isset($_POST['id']) &&isset($_POST['data'])) updateInstrument();
if (isset($_POST['addInstBtnForm']))addInstrument();
if(isset($_POST['categoryName']))addCat();
if(isset($_GET['categoryTocheck']))checkIfCatExist();
if(isset($_GET['getCategories'])) getCategories();



function getCategories(){
    $instrument = new Instrument();
    $rst = $instrument->getCategories();
    echo json_encode($rst);
}

function addCat(){
    $category_name=$_POST['categoryName'];
    $instrument = new Instrument();
    $instrument->setCategory($category_name);
    $_SESSION['setCategory']="Category $category_name setted successfuly";
    echo "<script>window.location.replace('index.php?page=manageInstruments')</script>";
}


function checkIfCatExist(){
    $category_name =$_GET['categoryTocheck'];
    $instrument = new Instrument();
    $checker = $instrument->ExistCategory($category_name);
    if($checker){
        echo "AE"; // already exist
    }
}

function addInstrument(){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $category = $_POST['category'];
    $available = $_POST['available'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // image ?
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
            $file_distination='./InstrumentsImages/'.$newUniqueNam;
            move_uploaded_file($imageTmpName,$file_distination);
        }else{
            $_SESSION['err-uplaoding_img']="TRY AGAIN !";
        }
    }else{
        $_SESSION['err-uplaoding_img']="can not upload file of this extention ! (only jpg,jpeg,png allowed )";
    }
}


function updateInstrument(){
    $instrument = new Instrument();
    $column = $_POST['column'];
    $id = intval($_POST['id']);
    $data = $_POST['data'];
    $instrument->updateInstrument($column,$data,$id);
    echo "<script>window.location.replace('index.php?page=manageInstruments')</script>";
    $_SESSION['update'] = "instrument updated succesfuly";
}


?>

