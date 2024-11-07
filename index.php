<?php
define("PATH", "http://10.100.2.7/origet/");
extract($_GET);
extract($_POST);

require_once("fungsi.php");

$folder = $_GET['folder']; // dashboard
$file = $_GET['file']; // home

$pages_dir = "pages/" .$folder; //pages/dashboard

if(is_dir($pages_dir)){
    $file_dir = $pages_dir."/".$file.".php"; //pages/dashboard/home.php

    if (is_file($file_dir)) {
        require_once($file_dir);
    }
    
}else{
    require_once("404.php");
}