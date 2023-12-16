<?php

class EditProfileModel {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserById($id_pengguna)
    {
        $select = mysqli_query($this->db, "SELECT * FROM `pengguna` WHERE id_pengguna = '$id_pengguna'") or die('query failed');

        return (mysqli_num_rows($select) > 0) ? mysqli_fetch_assoc($select) : false;
    }

    public function updateProfile($id_pengguna, $updateData)
    {
        $update_name = mysqli_real_escape_string($this->db, $updateData['update_name']);
        $update_email = mysqli_real_escape_string($this->db, $updateData['update_email']);

        mysqli_query($this->db, "UPDATE `pengguna` SET name = '$update_name', email = '$update_email' WHERE id_pengguna = '$id_pengguna'") or die('query failed');

        $old_pass = $_POST['old_pass'];
        $update_pass = mysqli_real_escape_string($this->db, md5($_POST['update_pass']));
        $new_pass = mysqli_real_escape_string($this->db, md5($_POST['new_pass']));
        $confirm_pass = mysqli_real_escape_string($this->db, md5($_POST['confirm_pass']));

        if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
            if($update_pass != $old_pass){
                $message[] = 'old password not matched!';
            }elseif($new_pass != $confirm_pass){
                $message[] = 'confirm password not matched!';
            }else{
                mysqli_query($db, "UPDATE `pengguna` SET password = '$confirm_pass' WHERE id_pengguna = '$id_pengguna'") or die('query failed');
                $message[] = 'password updated successfully!';
            }
        }

        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = '../uploaded_img/'.$update_image;

        if(!empty($update_image)){
            if($update_image_size > 2000000){
                $message[] = 'image is too large';
            }else{
                $image_update_query = mysqli_query($this->db, "UPDATE `pengguna` SET image = '$update_image' WHERE id_pengguna = '$id_pengguna'") or die('query failed');
                if($image_update_query){
                    move_uploaded_file($update_image_tmp_name, $update_image_folder);
                }
                $message[] = 'image updated succssfully!';
            }
        }

        return true;
    }
}
?>