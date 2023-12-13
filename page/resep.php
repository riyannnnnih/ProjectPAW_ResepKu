<?php require_once '../connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Makanan</title>
</head>

<body>
  <div>
    <?php
    $result = $db->query("SELECT * FROM RESEP");
    while ($row = $result->fetch_object()) {
      // Tambahkan hyperlink dengan URL dinamis yang membawa ID resep ke readresep.php
      echo "<a href='readresep.php?id=$row->Id_resep'>";
      echo "<img src='../images/$row->image' width='200'>";
      echo "<h1>$row->Judul</h1>";
      echo "</a>";
    }
    ?>
  </div>
</body>

</html>