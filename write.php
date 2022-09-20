<?php
    include_once("header.php");
    $user = $_SESSION['user'];
    if(isset($_SESSION['user'])){
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
        }
        // debug
        // echo "Title: ".$title. " Date: " .$date. " Thumbnail: ". $thumnail. " Content: ". $content;
    }else{
        header("Location: login.php");
    }
?>
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
                                <textarea class="form-control" rows="20" id="content" name="content" placeholder="Content" required="required" data-validation-required-message="Please write content."></textarea>
                                <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" id="postContent" name="postContent">Post</button>
                        </div>
                    </form>
                    <br>
<?php
    include_once("footer.php")
?>
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