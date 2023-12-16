<?php
session_start();
include_once "../connection.php";

class m_index{

    public function __construct(){

    }

    public function fetchRandomResep(){
        require "../connection.php";
        $resep = array();

        $result = $db->query("SELECT * FROM resep ORDER BY RAND() LIMIT 3");

        if ($result->num_rows > 0) {
            // Check data of each row
            while ($row = $result->fetch_assoc()) {
                $resep[] = $row;
            }
        } else {
            $resep = null;
        }
        return $resep;
    }

    public function login($email, $password){
        require "../connection.php";
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
                header('Location: v_login.php');
            }
        } else {
            $_SESSION['error_pass'] = false;
            $_SESSION['error_email'] = true;
            header('Location: v_login.php');
        }
    }

    public function reg($username, $email, $foto, $password){
        require "../connection.php";
        $row = array();

        $result = $db->query("SELECT * FROM pengguna");

        if ($result->num_rows > 0) {
            // Check data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row['Username'] == $username) {
                    $_SESSION['error_password'] = false;
                    $_SESSION['error_email'] = false;
                    $_SESSION['error_username'] = true;
                    header("Location: v_reg.php");
                } else if ($row['Email'] == $email) {
                    $_SESSION['error_password'] = false;
                    $_SESSION['error_username'] = false;
                    $_SESSION['error_email'] = true;
                    header("Location: v_reg.php");
                } else if ($row['Password'] == $password) {
                    $_SESSION['error_password'] = true;
                    header("Location: v_reg.php");
                }
            }
            $insert = $db->query("INSERT INTO pengguna (username, email, foto_profil, PASSWORD) VALUES ('$username', '$email', '$foto', '$password')");
            if ($insert) {
                header("Location: v_login.php");
                exit();
            } else {
                echo "Registrasi gagal. Silahkan coba lagi";
            }
        } else {
            $insert = $db->query("INSERT INTO pengguna (username, email, foto_profil, PASSWORD) VALUES ('$username', '$email', '$foto', '$password')");
            if ($insert) {
                header("Location: v_login.php");
                exit();
            } else {
                echo "Registrasi gagal. Silahkan coba lagi";
            }
        }
    }
}
