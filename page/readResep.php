<?php
// readresep.php

require_once '../connection.php';

// Periksa apakah ID resep telah diberikan
if (isset($_GET['id'])) {
  $id_resep = $_GET['id'];

  // Ambil detail resep berdasarkan ID
  $query = "SELECT * FROM RESEP WHERE id_resep = $id_resep";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_object();
    // Tampilkan detail resep
    echo "<h1>$row->Judul</h1>";
    echo "<img src='images/$row->image' width='200'>";
    echo "<h3>Bahan:</h3>";
    echo "<p>$row->Bahan</p>";
    echo "<h3>Langkah:</h3>";
    // Gunakan nl2br untuk menangani karakter ganti baris di Langkah
    echo "<p>" . nl2br($row->Langkah) . "</p>";
  } else {
    echo "Resep tidak ditemukan.";
  }
} else {
  echo "ID resep tidak diberikan.";
}
