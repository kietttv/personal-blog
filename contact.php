<?php
    include_once("header.php");
    $sql = "SELECT * FROM `user` WHERE userName = 'admin'";
    $re = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($re);

    if(isset($_POST['sendMessage'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $contentMess = mysqli_real_escape_string($conn, $_POST['message']);
      
        $sendMess = "INSERT INTO `message` (`cusName`, `cusEmail`, `cusSubject`, `messContent`, `messTo`) 
                    VALUES ('$name', '$email', '$subject', '$contentMess', '1')";
      
        if(mysqli_query($conn, $sendMess)){
            echo"<script>
                    window.location = 'contact.php?status=insert';
                    alert('Send success');
                </script>";
        }
        else{
            echo "error: ". $sendMess. "<br>". mysqli_errno($conn);
        }            
       // mysqli_query($conn, $sendMess);
    }
?>
<body>
            <!-- Page Header Start -->
            <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Contact Me</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="index.php">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">Contact Me</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->
            <!-- Contact Start -->
            <div class="container bg-white pt-5">
                <div class="row px-3 pb-2">
                    <div class="col-sm-4 text-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Address</h4>
                        <p><?=$row['address']?></p>
                    </div>
                    <div class="col-sm-4 text-center mb-3">
                        <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Phone</h4>
                        <p><?=$row['phone']?></p>
                    </div>
                    <div class="col-sm-4 text-center mb-3">
                        <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Email</h4>
                        <p><?=$row['email']?></p>
                    </div>
                </div>
                <div class="col-md-12 pb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" method="POST" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="8" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit" id="sendMessage" name="sendMessage">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>

    <!-- Contact Javascript File -->
    <!-- <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script> -->

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
<?php
    include_once("footer.php")
?>
    </body>
</html>