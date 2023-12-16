<?php
include '../../connection.php';
include '../model/m_editprofile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    <form action="" method="post" enctype="multipart/form-data">
        <?php
            $userEditProfile = new EditProfileModel($db);
            if (isset($_SESSION['id_pengguna'])) {
                $id_pengguna = $_SESSION['id_pengguna'];
                $updatedUser = $userEditProfile->getUserById($id_pengguna);
            
                if ($updatedUser !== false) {
                    if ($updatedUser['foto_profil'] == '') {
                        echo '<img src="../../images/default-avatar.png">';
                    } else {
                        echo '<img src="../uploaded_img/'.$updatedUser['foto_profil'].'">';
                    }
                    if (isset($message)) {
                        foreach ($message as $message) {
                            echo '<div class="message">' . $message . '</div>';
                        }
                    }
                } else {
                    echo 'User not found.';
                }
            } 
            // else {
            //     echo 'Session variable $id_pengguna is not set.';
            // }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>username :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['username']; ?>" class="box">
                <span>email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                <span>update photo:</span>
                <input type="file" name="update_image" accept="foto_profil/jpg, foto_profil/jpeg, foto_profil/png" class="box">
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
        <a href="" class="delete-btn">back</a>
   </form>
   </div>
    
</body>
</html>
