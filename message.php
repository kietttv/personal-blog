<?php
    include_once("header.php");
    if(isset($_SESSION['user'])){
        $selectMess = "SELECT * FROM `message` WHERE messTo = 1";
        $reSelectMess = mysqli_query($conn, $selectMess);
        $user = $_SESSION['user'];
    }else{
        header("Location: login.php");
    }
?>    
<!-- Mess List Start -->
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
                <div>
                    <p><?=$rowSelectMess['messContent']?></p>
                </div>
                <div>
                    <a href="deleteMess.php?id=<?=$rowSelectMess['id']?>" class="btn btn-primary"> Delete </a>
                </div>
            </div>
        </div>   
    </div>
    <hr>   
<?php }?>
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
</html>
