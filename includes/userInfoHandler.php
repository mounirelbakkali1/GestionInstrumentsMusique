<?php
session_start();
include_once('../classes/PendingUsers.class.php');
$user = new PendingUsers();

if(isset($_POST['updateUserInf'])){
    $column = $_POST['column'];
    $data = $_POST['data'];
    $id = $_POST['id'];
    $user->updateSingleUserInfo($column,$data,$id);
    $_SESSION['userInfo']=$user->getUserInfo($id)[0];
    if($column==="imgUrl")$column="Image";
    $_SESSION['update-info'] = "$column updated succesfuly";
    $_SESSION['img']=$data;
    echo "<script>window.location.replace('index.php?page=profil')</script>";

}

if(isset($_POST['savechanges'])){
    $f_name = $_POST['f_name'];
    $s_name = $_POST['s_name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $user->updateUserInfo($f_name,$s_name,$email,$id);
    $_SESSION['userInfo']=$user->getUserInfo($id)[0];
    echo "<script>window.location.replace('../index.php?page=profil')</script>";
}