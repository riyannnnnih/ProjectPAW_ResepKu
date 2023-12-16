<?php
include '../../connection.php';
include '../model/m_editprofile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prodile</title>
    <link rel="stylesheet" href="../../styles/editprofile.css">
    <script>
      function confirmEdit() {
         var result = confirm("Are you sure you want to edit?");
         if (result) {
            document.getElementById('confirm').value = "edit";
            document.getElementById('updateProfileForm').submit();
         } else {
            window.location.href = 'v_editprofile.php';
         }
      }
   </script>
</head>
<body>
    <div class="update-profile">
        <?php
            $userEditProfile = new EditProfileModel($db);
            $user = $userEditProfile->getUserById($user_id);
        ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
                echo '<img src="../../images/default-avatar.png">';
            }else{
                echo '<img src="../uploaded_img/'.$fetch['image'].'">';
            }
            if(isset($message)){
                foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
                }
            }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>username :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box">
                <span>your email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                <span>update your pic :</span>
                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <span>old password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                <span>new password :</span>
                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                <span>confirm password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
            </div>
        </div>
        <input type="submit" value="update profile" name="update_profile" class="btn">
        <a href="" class="delete-btn">go back</a>
   </form>
   </div>
    
</body>
</html>