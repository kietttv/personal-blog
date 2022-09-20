<?php
    include_once("header.php")
?>

<!-- Blog List Start -->
<?php
                while($rowPost = mysqli_fetch_assoc($rePosts)){
            ?>
                <div class="container bg-white pt-5">
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/<?=$rowPost['thumbnail']?>" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-10 mb-2 py-2 bg-white font-weight-bold"><?=$rowPost['title']?></h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"><?=$rowPost['date']?></i></small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                            <?=$rowPost['smallDescription']?>
                            </p>
                            <a class="btn btn-link p-0" href="blogDetail.php?id=<?=$rowPost['id']?>">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>                
            <?php 
                }
            ?>
<!-- Blog List End -->            

<?php
    include_once("footer.php")
?>