<?php
    include_once("header.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $selectPost = "SELECT * FROM `post` WHERE id = $id";
        $rePost = mysqli_query($conn, $selectPost);
        $rowPost = mysqli_fetch_assoc($rePost);

        $selectComment = "SELECT * FROM `comment` WHERE postID = '$id'";
        $reComment = mysqli_query($conn, $selectComment);

        $selectCount = "SELECT COUNT(id) FROM `comment` WHERE postID = '$id'";
        $reCount = mysqli_query($conn, $selectCount);
        $rowCount = mysqli_fetch_assoc($reCount);
    }
    if(isset($_POST['sendComment'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $commentContent = mysqli_real_escape_string($conn, $_POST['message']);

        $sendComment = "INSERT INTO `comment` (`cusName`, `cusEmail`, `commContent`, `postID`) 
                        VALUES ('$name', '$email', '$commentContent', '$id')";

        if(mysqli_query($conn, $sendComment)){
            echo"<script>
                window.location = 'blogDetail.php?id=$id';
            </script>";
        }else{
        echo "error: ". $sendComment. "<br>". mysqli_errno($conn);
        }        
    }
    
?>
<body>
            <!-- Page Header Start -->
            <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Blog Detail</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">Blog Detail</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Blog Detail Start -->
            <div class="container py-5 px-2 bg-white">
                <div class="row px-4">
                    <div class="col-12">
                        <img class="img-fluid mb-4" src="img/<?=$rowPost['thumbnail']?>" alt="Image">
                        <h2 class="mb-3 font-weight-bold"><?=$rowPost['title']?></h2>
                        <div class="d-flex">
                            <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i><?=$rowPost['date']?></p>
                            <p class="mr-3 text-muted"><i class="fa fa-folder"></i>Web Design</p>
                            <p class="mr-3 text-muted"><i class="fa fa-comments"></i><?=$rowCount['COUNT(id)']?> Comments</p>
                        </div>
                        <img class="w-50 float-left mr-4 mb-3" src="img/<?=$rowPost['imgDetail']?>" alt="Image">
                        <p></i><?=$rowPost['content']?></p>
                    </div>
                    <!-- <div class="col-12 py-4">
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                    </div> -->
                    <!-- <div class="col-12 py-4">
                        <div class="btn-group btn-group-lg w-100">
                            <button type="button" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i> Previous</button>
                            <button type="button" class="btn btn-outline-primary">Next<i class="fa fa-angle-right ml-2"></i></button>
                        </div> 
                    </div> -->
                    <div class="col-12 py-4">
                        <h3 class="mb-4 font-weight-bold"><?=$rowCount['COUNT(id)']?> Comments</h3>
                <?php while($rowComment = mysqli_fetch_assoc($reComment)){?>
                    <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                            <div class="media-body">
                                <h4><small><?=$rowComment['cusName']?> <i>  01 Jan 2045 at 12:00pm</i></small></h4>
                                <p><?=$rowComment['commContent']?></p>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">Reply</label>
                                        <input type="text" class="form-control" id="reply" name="reply">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-light" type="submit" id="reply" name="reply">Reply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                <?php }?> 
                    </div>
                    <div class="col-12">
                        <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <!-- <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website" name="website">
                            </div> -->
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit" id="sendComment" name="sendComment">Send Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blog Detail End -->
                
            <!-- Footer Start -->
            <?php
                include_once("footer.php")
            ?>
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
