<?php
    $server = "localhost";
    $username ="root";
    $password = "";
    $db = "my_blog";

    $conn = mysqli_connect($server,$username,$password,$db);
    if($conn->connect_error){
        die("Failed ".$conn->connect_error);
    }
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
?>
