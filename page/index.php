<?php
include_once "./c_index.php";

$controller = new index();

if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $controller->login($email, $password);
}

if (isset($_POST['regUsername']) && isset($_POST['regEmail']) && isset($_POST['regPassword'])) {
    $username = $_POST['regUsername'];
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    $foto = null;
    $new_file_path = "C:\\xampp\\htdocs\\PAW\\Project\\ProjectPAW_ResepKu\\images\\";

    $upload_path = $controller->upload($new_file_path, $_FILES['foto']);

    if ($upload_path) {
        // File uploaded successfully
        $foto = $upload_path;
    } else {
        // File upload failed
        echo "Upload foto gagal";
    }

    $controller->reg($username, $email, $foto, $password);
}



$controller->invoke();
