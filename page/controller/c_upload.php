<?php

session_start();
require_once "../../connection.php";
require '../model/m_resep.php';

if (isset($_POST['submit'])) {
  $modelObj = new ModelResep($db);

  $judul = $_POST['judulResep'];
  $bahan = $_POST['bahanResep'];
  $langkah = $_POST['langkahResep'];
  // $id_pengguna = $_SESSION['id_pengguna'];

  if ($_FILES['image']['error'] === 4) {
    echo "<script> alert('Image tak ditemukan') </script>";
  } else {
    $filename = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $tmpName = $_FILES['image']['tmp_name'];

    $imageExtension = explode(".", $filename);
    $imageExtension = strtolower(end($imageExtension));

    if ($fileSize > 1000000000) {
      echo "<script> alert('Ukuran Image terlalu besar') </script>";
    } else {
      $uniqImageName = uniqid();
      $uniqImageName = $uniqImageName . '.' . $imageExtension;

      move_uploaded_file($tmpName, '../../images/' . $uniqImageName);

      $modelObj->insertResep($judul, $bahan, $langkah, 01, $uniqImageName);

      echo "<script> alert('Berhasil Menambahkan');
      document.location.href = '../view/v_index.php';
      </script>";
    }
  }
}
