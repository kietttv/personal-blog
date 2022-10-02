<?php
//Connect My SQL
    $server = "localhost";
    $username ="root";
    $password = "";
    $db = "my_blog";
    $conn = mysqli_connect($server,$username,$password,$db);
    if($conn->connect_error){
        die("Failed ".$conn->connect_error);
    }

//Connect Portgresql
    // $conn = pg_connect("postgres://ertmhtekkywqrm:b6a5766dc1439c63e404f43d7b3c9a22b320a1d903863756a2bb8df03f7ca418@ec2-3-93-206-109.compute-1.amazonaws.com:5432/da4eqb5n6u4tj0");
    // if(!$conn){
    //     die("Connect failed");
    // }
    // ini_set('display_errors',1);
    // ini_set('display_startup_errors',1);
    // error_reporting(E_ALL);

?>
