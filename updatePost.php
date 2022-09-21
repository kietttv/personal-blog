<?php
    include_once("header.php");
    $user = $_SESSION['user'];
    if(isset($_SESSION['user'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $selectPost = "SELECT * FROM `post` WHERE id = $id";
            $rePost = mysqli_query($conn, $selectPost);
            $rowPost = mysqli_fetch_assoc($rePost);
        }

        if(isset($_POST['updateContent'])){
            $date = mysqli_real_escape_string($conn, $_POST['contentDate']);
            $thumnail = mysqli_real_escape_string($conn, $_POST['thumbnail']);
            $imgDtail = mysqli_real_escape_string($conn, $_POST['imgDetail']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);

            if($thumnail == null){
                $thumnail = mysqli_real_escape_string($conn, $_POST['imgThumbnail_old']);
            }

            if($imgDtail == null){
                $imgDtail = mysqli_real_escape_string($conn, $_POST['imgDetail_old']);
            }
    
            $update_post = "UPDATE `post` 
                            SET `date` = '$date', `thumbnail` = '$thumnail', `content` = '$content', `title` = '$title', `smallDescription` = '', `imgDetail` = '$imgDtail' 
                            WHERE `post`.`id` = $id";
    
            if(mysqli_query($conn, $update_post)){
                echo"<script>
                        window.location = 'blogDetail.php?id=$id';
                    </script>";
            }
            else{
                echo "error: ". $update_post. "<br>". mysqli_errno($conn);
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
                            <input value="<?=$rowPost['title']?>" type="text" class="form-control" id="title" name="title" placeholder="Title" required="required" data-validation-required-message="Please enter title" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                                <label for="first-name-vertical">Date</label>
                                <input id="contentDate" class="form-control" type="date" name="contentDate" value ="<?=$rowPost['date']?>" placeholder="yyyy-mm-dd"/>                  
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Old thumbnail:</label><br>
                            <img class="mb-4" width="50%" src="img/<?=$rowPost['thumbnail']?>" alt="Image">
                            <input type="hidden" name="imgThumbnail_old" value="<?=$rowPost['thumbnail']?>">
                            <div class="form-group">
                                <label for="thumbnail">Edit thumbnail:</label>
                                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imgDetail">Old image detail:</label><br>
                            <img class="mb-4" width="50%" src="img/<?=$rowPost['imgDetail']?>" alt="Image">
                            <input type="hidden" name="imgDetail_old" value="<?=$rowPost['imgDetail']?>">
                            <div class="form-group">
                                <label for="imgDetail">Edit thumbnail:</label>
                                <input type="file" class="form-control-file" id="imgDetail" name="imgDetail">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="first-name-vertical">Content</label>
                                <textarea class="form-control" rows="20" id="content" name="content" placeholder="Content" required="required" data-validation-required-message="Please write content."><?=$rowPost['content']?></textarea>
                                <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" id="updateContent" name="updateContent">Update Post</button>
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

