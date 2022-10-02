<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tuan Kiet Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
include_once("connect.php");
$sql = "SELECT * FROM `user` WHERE userName = 'admin'";
$re = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($re);
?>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/<?= $row['avata'] ?>" alt="Image">
                <h1 class="font-weight-bold" id="name" name="name"><?= $row['fullName'] ?></h1>
                <p class="mb-4" class="bio" id="bio" name="bio">
                    <?= $row['bio'] ?>
                </p>
                <div class="d-flex justify-content-center mb-5">
                    <a class="btn btn-outline-primary mr-2" href="https://twitter.com/tk1eetj"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="https://www.facebook.com/k1eetj/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="https://www.linkedin.com/in/truong-van-tuan-kiet-fgw-ct-5bba9a250/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="https://www.instagram.com/ki33tj/?hl=vi"><i class="fab fa-instagram"></i></a>
                </div>
                <!-- <img class="w-100" src="img/google-developer-student-club-logo.png" alt="Image"> -->
                <!-- <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a> -->
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            <img class="w-100" src="img/GDSC.png" alt="Image">
            <!-- <img src="img/GDSC.png" width="750 %" alt="img"> -->
            <!-- Navbar Start -->
            <div class="container p-0">
                <img src="/img/GDSC.png" alt="">
                <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                    <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <?php
                            session_start();
                            if (isset($_SESSION['user'])) {
                            ?>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manager</a>
                                    <div class="dropdown-menu">
                                        <a href="write.php" class="dropdown-item">Write new Blog</a>
                                        <!-- <a href="#" class="dropdown-item">Manager Blog</a> -->
                                        <a href="message.php" class="dropdown-item">Message</a>
                                    </div>
                                </div>
                                <a href="updateProfile.php" class="nav-item nav-link">Welcome, <?= $_SESSION['user'] ?></a>
                                <a href="logout.php" class="nav-item nav-link">Logout</a>
                            <?php
                            } else {
                            ?>
                                <a href="login.php" class="nav-item nav-link">Login</a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Navbar End -->