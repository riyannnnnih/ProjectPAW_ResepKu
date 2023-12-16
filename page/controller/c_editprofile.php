<?php
include '../../connection.php';
include '../model/m_editprofile.php';

session_start();

$id_pengguna = $_SESSION['id_pengguna'];


if (isset($_POST['update_profile'])) {
    $userEditProfile = new EditProfileModel($db);
    
    
    $updateData = [
        'update_name' => $_POST['update_name'],
        'update_email' => $_POST['update_email'],
        'old_pass' => $_POST['old_pass'],
        'update_pass' => $_POST['update_pass'],
        'new_pass' => $_POST['new_pass'],
        'confirm_pass' => $_POST['confirm_pass'],
        'update_image' => $_FILES['update_image']
    ];

    $userEditProfile->updateProfile($id_pengguna, $updateData);

    $updatedUser = $userEditProfile->getUserById($id_pengguna);

    include '../view/v_editprofile.php';
}
?>
