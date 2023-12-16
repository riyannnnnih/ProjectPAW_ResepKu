<?php
session_start();
include "../connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    require "../connection.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $foto = $_FILES['foto'];
    $row = array();

    $result = $db->query("SELECT * FROM pengguna");

    if ($result->num_rows > 0) {
        // Check data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row['Username'] == $username) {
                $_SESSION['error_password'] = false;
                $_SESSION['error_email'] = false;
                $_SESSION['error_username'] = true;
                header("Location: reg.php");
            } else if ($row['Email'] == $email) {
                $_SESSION['error_password'] = false;
                $_SESSION['error_username'] = false;
                $_SESSION['error_email'] = true;
                header("Location: reg.php");
            } else if ($row['Password'] == $password) {
                $_SESSION['error_password'] = true;
                header("Location: reg.php");
            }
        }
        $insert = $db->query("INSERT INTO pengguna (username, email, foto_profil, PASSWORD) VALUES ('$username', '$email', '$foto', '$password')");
        if ($insert) {
            header("Location: login.php");
            exit();
        } else {
            echo "Registrasi gagal. Silahkan coba lagi";
        }
    } else {
        $insert = $db->query("INSERT INTO pengguna (username, email, foto_profil, PASSWORD) VALUES ('$username', '$email', '$foto', '$password')");
        if ($insert) {
            header("Location: login.php");
            exit();
        } else {
            echo "Registrasi gagal. Silahkan coba lagi";
        }
    }
}

include "v_reg.php";
