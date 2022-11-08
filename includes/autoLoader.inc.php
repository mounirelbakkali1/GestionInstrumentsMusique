<?php

spl_autoload_register('myAutoLoaderFn');


function myAutoLoaderFn($class){
    $path = 'classes/';
    $extention ='.class.php';
    $full_path =$path.$class.$extention;
    if(!file_exists($full_path)){
        return false;
    }

    include_once ($full_path);

}