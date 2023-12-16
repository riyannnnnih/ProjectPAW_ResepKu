<?php
include_once "./c_index.php";

$controller = new index();

if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $controller->login($email, $password);
}

if(isset($_POST['regUsername']) && isset($_POST['regEmail']) && isset($_POST['regPassword'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $foto = $_FILES['foto'];

    $controller->reg($username, $email, $foto, $password);
}

$controller->invoke();