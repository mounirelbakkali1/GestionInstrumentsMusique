<?php
session_start();
include_once('../classes/Instrument.class.php');
if(isset($_POST['column'])&& isset($_POST['id']) &&isset($_POST['data'])) updateInstrument();
if (isset($_POST['addInstBtnForm']))addInstrument();
if(isset($_POST['categoryName']))addCat();
if(isset($_GET['categoryTocheck']))checkIfCatExist();
if(isset($_GET['getCategories'])) getCategories();
if(isset($_POST['delIntrument'])) deleteInstrument();



function getCategories(){
    $instrument = new Instrument();
    $rst = $instrument->getCategories();
    echo json_encode($rst);
}

function addCat(){
    $category_name=$_POST['categoryName'];
    $instrument = new Instrument();
    $instrument->setCategory($category_name);
    $_SESSION['update']="Category $category_name setted successfuly";
    echo "<script>window.location.replace('index.php?page=manageInstruments')</script>";
}


function checkIfCatExist(){
    $category_name =$_GET['categoryTocheck'];
    $instrument = new Instrument();
    $checker = $instrument->ExistCategory($category_name);
    if($checker){
        echo "AE"; // already exist
        $_SESSION['err-uplaoding_img']="Category already Exist";
    }
}

function addInstrument(){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $category = $_POST['category'];
    $available = $_POST['available'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image'];
    $file_distination;
    if(checkValidity($name,$desc,$category,$available,$price,$quantity,$image)){
        $instrument = new Instrument();
        global $file_distination;
        $actualURL;
        if (empty($file_distination)){
            $actualURL ="includes/InstrumentsImages/default.png";
        }else{
            $actualURL="./includes/".$file_distination;
        }
        $instrument->addIntrument($name,$price,$quantity,$available,$actualURL,$desc,$category);
        $_SESSION['update']="Instrument added successfuly";
        echo "<script>window.location.replace('../index.php?page=manageInstruments')</script>";

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

function deleteInstrument(){
    $id = $_POST['id'];
    $imgURL = $_POST['imgURL'];
    if (strlen($imgURL)<150){
        unlink($imgURL);
    }
    $instrument = new Instrument();
    $instrument->deleteInstrument($id);
    $_SESSION['update'] = "instrument deleted succesfuly";
    echo "<script>window.location.replace('index.php?page=manageInstruments&del=sucess')</script>";

}


function checkValidity($name,$desc,$category,$available,$price,$quantity,$image){
    $rst;
   if(!checkImg()){
       echo "<script>window.location.replace('../index.php?page=manageInstruments')</script>";
       $rst=false;
   }else{
       if(empty($name) || empty($desc) || empty($quantity) ||empty($price) || empty($category) ){ // we don't check if $available is empty because it may equals to zero and zero considered empty
           echo "<script>window.location.replace('../index.php?page=manageInstruments&errAdding=empty&n=".$name."&d=".$desc."&q=".$quantity."&p=".$price."&n=".$category."&a=".$available."')</script>";
           $rst=false;
       }elseif (!is_numeric($price) || !is_numeric($quantity) || !is_numeric($available) || !is_numeric($category)){
           $rst=false;
           echo "<script>window.location.replace('../index.php?page=manageInstruments&errAdding=InvaliddataType')</script>";
       }elseif (!preg_match('/^[a-z0-9 .\-]+$/i',$name) || !preg_match('/^[a-z0-9 .\-]+$/i',$desc)){
           $rst=false;
           echo "<script>window.location.replace('../index.php?page=manageInstruments&errAdding=specialChar')</script>";
       }else{
           $rst=true;
       }
   }
   return $rst;
}


function checkImg(){
    $rstOfcheck;
    // image ?
    $imageName =$_FILES['image']['name'];
    if(empty($imageName)){
        return true; // image is optional to need to complete checking process if not entred
        exit();
    }
    $imageTmpName = $_FILES['image'] ['tmp_name'] ;
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image'] ['type'];
    //=preg_split("/\s+(?=\S*+$)/",$imageName);
    $tabExt=explode('.',$imageName,2);
    $imageExt=strtolower(end($tabExt)); // end :because we have array returned from spliting
    $extAllowed=array("jpg","jpeg","png");
    global $file_distination;
    if(in_array($imageExt,$extAllowed)){
        if($imageError==0){
            $newUniqueNam= uniqid('',true).".".$imageExt;
            $file_distination='InstrumentsImages/'.$newUniqueNam;
            move_uploaded_file($imageTmpName,$file_distination);
            $rstOfcheck=true;
        }else{
            $_SESSION['err-uplaoding_img']="TRY AGAIN !";
            $rstOfcheck=false;
        }
    }else{
        $_SESSION['err-uplaoding_img']="can not upload image of extention .$imageExt ! (only jpg , jpeg , png allowed )";
        $rstOfcheck=false;
    }
    return $rstOfcheck;
}



?>

