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
    if(isset($_POST['postContent'])){
        $date = mysqli_real_escape_string($conn, $_POST['contentDate']);
        $thumnail = mysqli_real_escape_string($conn, $_POST['thumbnail']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        $insert_post = "INSERT INTO `post` (`userID`, `date`, `thumbnail`, `title`, `content`) 
                        VALUES ('1', '$date', '$thumnail', '$title', '$content')";

        if(mysqli_query($conn, $insert_post)){
            echo"<script>
                    window.location = 'index.php?status=insert';
                </script>";
        }
        else{
            echo "error: ". $insert_post. "<br>". mysqli_errno($conn);
        } 
        // debug
        // echo "Title: ".$title. " Date: " .$date. " Thumbnail: ". $thumnail. " Content: ". $content;
    }
?>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                    <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/<?=$row['avata']?>" alt="Image">
                    <h1 class="font-weight-bold" id="name" name="name"><?=$row['fullName'] ?></h1>
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
<!-- start nav -->
                <div class="container p-0">
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
                                    <a href="login.php" class="nav-item nav-link">Login</a>
                                </div>
                            </div>
                        </nav>
                    </div>
<!-- end nav -->
                    <form name="writeContent" id="writeContent" method="POST" novalidate="novalidate">
                        <div class="control-group">
                            <label for="first-name-vertical">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="required" data-validation-required-message="Please enter title" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                                <label for="first-name-vertical">Date</label>
                                <input id="contentDate" class="form-control" type="date" name="contentDate" value ="" placeholder="yyyy-mm-dd"/>                  
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Add thumbnail:</label>
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="control-group">
                            <label for="first-name-vertical">Content</label>
                                <textarea class="form-control" rows="15" id="content" name="content" placeholder="Content" required="required" data-validation-required-message="Please write content."></textarea>
                                <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" id="postContent" name="postContent">Post</button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>