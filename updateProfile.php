<?php
    include_once("header.php");
    if(isset($_SESSION['user'])){
        $sql = "SELECT * FROM `user` WHERE userName = 'admin'";
        $re = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($re);

        if(isset($_POST['updateProfile'])){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $bio = mysqli_real_escape_string($conn, $_POST['bio']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $imgUP = mysqli_real_escape_string($conn, $_POST['avata']);
            
            if($imgUP == null){
                $imgUP = mysqli_real_escape_string($conn, $_POST['img_old']);
            }

            $updateProfile = "UPDATE `user` 
                            SET `fullName` = '$name', `avata` ='$imgUP', `bio` = '$bio', `address` = '$address', `phone` = '$phone', `email` = '$email'
                            WHERE `user`.`id` = 1";

            if(mysqli_query($conn, $updateProfile)){
                echo"<script>
                    window.location = 'index.php?status=update';
                </script>";
            }
            else{
                echo "error: ". $updateProfile. "<br>". mysqli_errno($conn);
            }
            // debug
            // echo $name. $bio. $address. $phone. $email;
            //echo $updateProfile;
        }
    }else{
        header("Location: login.php");
    }
?>
<!-- strat from -->
<div>
    <form name="updateProfile" id="updateProfile" method="POST" novalidate="novalidate">
        <div class="control-group">
            <div class="form-group">
                <img class="mx-auto d-block bg-primary img-fluid rounded-circle mb-4 p-3" width="30%" src="img/<?=$row['avata']?>" alt="Image">
                <input type="hidden" name="img_old" value="<?=$row['avata']?>">
            </div>
            <div class="form-group">
                <label for="thumbnail">Change avata:</label>
                <input type="file" class="form-control-file" id="avata" name="avata">
            </div>
            <div class="control-group">
                <label for="first-name-vertical">Change name: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Change Name" required="required" data-validation-required-message="Please enter name" value="<?=$row['fullName'] ?>"/>
                <p class="help-block text-danger"></p>
            </div>
            <label for="first-name-vertical">Edit bio: </label>
            <textarea class="form-control" rows="3" id="content" name="bio" placeholder="Bio" required="required" data-validation-required-message="Please enter bio."><?=$row['bio']?></textarea>
            <p class="help-block text-danger"></p>
            <div class="control-group">
                <label for="first-name-vertical">Change address: </label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Change address" required="required" data-validation-required-message="Please enter address" value="<?=$row['address'] ?>"/>
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <label for="first-name-vertical">Change phone: </label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Change phone" required="required" data-validation-required-message="Please enter phone" value="<?=$row['phone'] ?>"/>
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <label for="first-name-vertical">Change email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Change email" required="required" data-validation-required-message="Please enter email" value="<?=$row['email'] ?>"/>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" id="updateProfile" name="updateProfile">Update</button>
        </div>
        <br>
    </form>
</div>
<!-- end from -->
<?php
    include_once("footer.php")
?>
</body>
</html>
    