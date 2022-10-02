<?php
include_once("connect.php");
include_once("header.php");

$user = $_SESSION['user'];

if(isset($_SESSION['user'])){
    if (isset($_GET['id'])) {
        $delMessQuery = "DELETE FROM message WHERE `message`.`id` = '".$_GET['id']."' ";
        if (mysqli_query($conn, $delMessQuery)) { 
            echo " <script>window.location = 'message.php?status=delete';</script>";
        } else {
            echo "Error: " . $sql . "<br>" .mysqli_error($conn);
        }
    }
}else{
    header("Location: login.php");
}