<?php
include_once("connect.php");
include_once("header.php");
if (isset($_SESSION['user'])) {
    if (isset($_GET['id'])) {
        $idCmt = $_GET['id'];
        $hideCmt = "UPDATE `comment` SET `stt` = '1' WHERE `comment`.`id` = $idCmt";
        if (mysqli_query($conn, $hideCmt)) {
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<script>
            window.location = '$url';
            </script>";
        }
    } else { ?>
        <script>
            window.alert("Something went wrong!!!");
            window.location = 'index.php';
        </script>
<?php }
} else {
    header("Location: login.php");
}
?>