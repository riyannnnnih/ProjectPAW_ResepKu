<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Resep</title>
</head>

<body>
  <?php if ($resep) : ?>
    <h1><?php echo $resep->Judul; ?></h1>
    <img src='../../images/<?php echo $resep->image; ?>' width='200'>
    <h3>Bahan:</h3>
    <p><?php echo $resep->Bahan; ?></p>
    <h3>Langkah:</h3>
    <p><?php echo nl2br($resep->Langkah); ?></p>
  <?php else : ?>
    <p>Resep tidak ditemukan.</p>
  <?php endif; ?>
</body>

</html>