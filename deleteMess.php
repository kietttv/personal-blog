<?php
include_once("connect.php");

if (isset($_GET['id'])) {

    //$delQuery= "Delete from product where Product_ID ='".$_GET['id']."'";
    $delMessQuery = "DELETE FROM message WHERE `message`.`id` = '".$_GET['id']."' ";

    if (mysqli_query($conn, $delMessQuery)) { 
        echo " <script>window.location = 'message.php?status=delete';</script>";
    } else {
        echo "Error: " . $sql . "<br>" .mysqli_error($conn);
    }
}
?>