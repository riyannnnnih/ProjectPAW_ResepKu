<?php session_start();
include("../connection.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $db->query("SELECT * FROM pengguna WHERE Email = '$email'");

    if ($result->num_rows == 1) {
        $login = $result->fetch_assoc();
        if ($password == $login['Password']) {
            $_SESSION['email'] = $login['Email'];
            $_SESSION['id_pengguna'] = $login['Id_pengguna'];
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error_pass'] = true;
        }
    } else {
        $_SESSION['error_pass'] = false;
        $_SESSION['error_email'] = true;
    }
}
include("v_login.php");
