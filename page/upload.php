<?php

require '../connection.php';
if (isset($_POST['submit'])) {
  $judul = $_POST['judulResep'];
  $bahan = $_POST['bahanResep'];
  $langkah = $_POST['langkahResep'];
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

      move_uploaded_file($tmpName, '../images/' . $uniqImageName);
      $query = "INSERT INTO resep VALUES ('', '$judul', '$bahan', '$langkah', CURRENT_TIMESTAMP(), '01', '$uniqImageName')";
      mysqli_query($db, $query);
      echo "<script> alert('Berhasil Menambahkan');
      document.location.href = 'index.php';
      </script>";
    }
  }
}
