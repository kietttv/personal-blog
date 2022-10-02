<?php
include_once("header.php");
$selectPosts = "SELECT * FROM `post` WHERE postStatus = 0";
$rePosts = mysqli_query($conn, $selectPosts);

$selectNewPosts = "SELECT * FROM `post` WHERE postStatus = 0 ORDER BY DATE(date) DESC ,date ASC LIMIT 3;";
$reNewPosts = mysqli_query($conn, $selectNewPosts);
$i = 1;
?>
<!-- Carousel Start -->
<br>
<div class="container p-0">
    <div id="blog-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            while ($rowNewPost = mysqli_fetch_assoc($reNewPosts)) {
                $selectCount = "SELECT COUNT(id) FROM `comment` WHERE postID = $rowNewPost[id]";
                $reCount = mysqli_query($conn, $selectCount);
                $rowCount = mysqli_fetch_assoc($reCount);
                if ($i == 1) { ?>
                    <div class="carousel-item active">
                    <?php } else { ?>
                        <div class="carousel-item">
                        <?php } ?>
                        <img class="w-100" height="400 px" src="img/<?= $rowNewPost['thumbnail'] ?>" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <h2 class="mb-3 text-white font-weight-bold"><?= $rowNewPost['title'] ?></h2>
                            <div class="d-flex text-white">
                                <small class="mr-2"><i class="fa fa-calendar-alt"></i><?= $rowNewPost['date'] ?></small>
                                <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2"><i class="fa fa-comments"></i> <?= $rowCount['COUNT(id)'] ?> Comments</small>
                            </div>
                            <a href="blogDetail.php?id=<?= $rowNewPost['id'] ?>" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                        </div>
                        </div>
                    <?php
                    $i++;
                }
                    ?>
                    </div>
                    <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    <br>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Blog List Start -->
    <?php while ($rowPost = mysqli_fetch_assoc($rePosts)) {
        $selectCount = "SELECT COUNT(id) FROM `comment` WHERE postID = $rowPost[id]";
        $reCount = mysqli_query($conn, $selectCount);
        $rowCount = mysqli_fetch_assoc($reCount);
    ?>
        <div class="container bg-white pt-5">
            <div class="row blog-item px-3 pb-5">
                <div class="col-md-5">
                    <img class="img-fluid mb-4 mb-md-0" src="img/<?= $rowPost['thumbnail'] ?>" alt="Image">
                </div>
                <div class="col-md-7">
                    <h3 class="mt-md-4 px-md-10 mb-2 py-2 bg-white font-weight-bold"><?= $rowPost['title'] ?></h3>
                    <div class="d-flex mb-3">
                        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"><?= $rowPost['date'] ?></i></small>
                        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                        <small class="mr-2 text-muted"><i class="fa fa-comments"></i> <?= $rowCount['COUNT(id)'] ?> Comments</small>
                    </div>
                    <p><?= $rowPost['smallDescription'] ?></p>
                    <a class="btn btn-link p-0" href="blogDetail.php?id=<?= $rowPost['id'] ?>">Read More <i class="fa fa-angle-right"></i></a>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a class="btn btn-link p-0" href="updatePost.php?id=<?= $rowPost['id'] ?>">Edit<i class="fa fa-angle-right"></i></a>
                        <a class="btn btn-link p-0" onclick="deletePost(<?= $rowPost['id']?>)" href="#?id=<?= $rowPost['id'] ?>">Delete<i class="fa fa-angle-right"></i></a>
                        <script>
                            function deletePost(id) {
                                if (confirm('Do you want to delete ' + id + '?') == true) {
                                    window.location.href = 'hidePost.php?id=' + id;
                                    //window.location.href = "index.php";
                                }
                            }
                        </script>
                    <?php } ?>
                </div>
            </div>
        </div>
        <hr>
    <?php } ?>
    <!-- Blog List End -->
    <!-- Footer Start -->
    <?php
    include_once("footer.php")
    ?>
    <!-- Footer End -->
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