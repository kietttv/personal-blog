<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bloggy - Personal Blog Template</title>
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
    include_once("./connect.php");
    $sql = "SELECT * FROM `user` WHERE userName = 'admin'";
    $re = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($re);

    $selectMess = "SELECT * FROM `message` WHERE messTo = 1";
    $reSelectMess = mysqli_query($conn, $selectMess);
    
?>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                    <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/<?=$row['avata']?>" alt="Image">
                    <h1 class="font-weight-bold" id="name" name="name"><?=$row['fullName']?></h1>
                    <p class="mb-4" class="bio" id="bio" name="bio">
                        <?=$row['bio']?>
                    </p>
                    <div class="d-flex justify-content-center mb-5">
                        <a class="btn btn-outline-primary mr-2" href="https://twitter.com/tk1eetj"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary mr-2" href="https://www.facebook.com/k1eetj/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary mr-2" href="https://www.linkedin.com/in/truong-van-tuan-kiet-fgw-ct-5bba9a250/"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-primary mr-2" href="https://www.instagram.com/ki33tj/?hl=vi"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a> -->
                </div>
                <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                    <i class="fas fa-2x fa-angle-double-right text-primary"></i>
                </div>
            </div>
            <div class="content">
                <!-- Navbar Start -->
                <div class="container p-0">
                    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                        <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav m-auto">
                                <a href="index.php" class="nav-item nav-link active">Home</a>
                                <a href="about.php" class="nav-item nav-link">About</a>\
                                <a href="contact.html" class="nav-item nav-link">Contact</a>
                                <a href="login.php" class="nav-item nav-link">Login</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- Navbar End -->                
                <!-- Blog List Start -->
                            <?php
                                while($rowSelectMess = mysqli_fetch_assoc($reSelectMess)){
                            ?>
                                <div class="container bg-white pt-10">
                                    <div class="row blog-item px-3 pb-5">
                                        <div class="col-md-10">
                                            <h2 class="mt-md-2 px-md-3 mb-2 py-2 bg-white font-weight-bold"><?=$rowSelectMess['cusName']?></h2>
                                            <div class="d-flex mb-3">
                                                <small class="mr-2 text-muted"><i class="bi bi-envelope-fill">Email: </i><?=$rowSelectMess['cusEmail'] ?></small>
                                                <small class="mr-2 text-muted">Subject: <?=$rowSelectMess['cusSubject']?></small>
                                            </div>
                                        </div>
                                        <div>
                                            <p><?=$rowSelectMess['messContent']?></p>
                                            <a href="deleteMess.php?id=<?=$rowSelectMess['id']?>" class="btn btn-primary"> Delete </a>
                                        </div>
                                    </div>   
                                </div>
                                <hr>   
                            <?php }?>
                <!-- Blog List End -->
                <!-- Footer Start -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        &copy; <a class="text-white font-weight-bold" href="#">Tuan Kiet Blog</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
                <!-- Footer End -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
