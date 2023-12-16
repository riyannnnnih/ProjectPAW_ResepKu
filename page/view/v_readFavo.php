<?php require_once "../controller/c_showFavo.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Favorit</title>
  <link rel="stylesheet" href="../../styles/resep-card.css">
</head>

<body>
  <p id="judul">Daftar Resep Favorit</p>
  <div class="resep-card">
    <?php foreach ($resepList as $resep) : ?>
      <!-- Tambahkan hyperlink dengan URL dinamis yang membawa ID resep ke readresep.php -->
      <a href="../controller/c_readResep.php?id=<?php echo $resep->Id_resep; ?>">
        <img src='../../images/<?php echo $resep->image; ?>' width='200'>
        <h1><?php echo $resep->Judul; ?></h1>
        <p>Oleh <?php echo $resep->Username ?></p>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Pagination -->
  <div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
      <a href="?page=<?php echo $i; ?>" <?php if ($i == $currentpage) echo 'class="active"'; ?>><?php echo "| " . $i . " |"; ?></a>
    <?php endfor; ?>
  </div>
</body>

</html>