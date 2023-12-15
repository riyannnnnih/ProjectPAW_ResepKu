<?php include_once '../controller/c_resepList.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Makanan</title>
  <link rel="stylesheet" href="../../styles/resep-card.css">
</head>

<body>
  <div class="resep-card">
    <?php foreach ($resepList as $resep) : ?>
      <!-- Tambahkan hyperlink dengan URL dinamis yang membawa ID resep ke readresep.php -->
      <a href="../controller/c_readResep.php?id=<?php echo $resep->Id_resep; ?>">
        <img src='../../images/<?php echo $resep->image; ?>' width='200'>
        <h1><?php echo $resep->Judul; ?></h1>
      </a>
    <?php endforeach; ?>
  </div>
</body>

</html>