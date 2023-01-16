<?php
function hidePost($id, $status)
{
    include("connect.php");
    include_once("header.php");
    $hidePost = "UPDATE `post` 
                SET `postStatus` = '$status'
                WHERE `post`.`id` = $id";
    if (mysqli_query($conn, $hidePost)) {
        echo "<script>
                window.location = 'index.php';
            </script>";
    } else {
        echo "error: " . $hidePost . "<br>" . mysqli_errno($conn);
    }
}
include_once("header.php");
$user = $_SESSION['user'];
if (isset($_SESSION['user'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        hidePost($id, '1');
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