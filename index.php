<?php require_once 'upload.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Resep</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
  <nav>

  </nav>
  <div class="container-1">
    <div>
      <h1>Upload Resep</h1>
    </div>
    <div class="container-2">
      <div class="img-container">
        <form action="upload.php" method="post" id="formUpload" enctype="multipart/form-data">
          <label for="image">Upload Cover Gambar</label>
          <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg">
          <input type="text" name="judulResep" id="judulResep" placeholder="Judul Resep..." required>
          <input type="text" name="bahanResep" id="bahanResep" placeholder="Bahan Resep..." required>
          <textarea name="langkahResep" id="langkahResep" placeholder="Langkah Resep..." required></textarea>
          <input type="submit" name="submit">
        </form>
      </div>
      <div>
        <div class="langkah-wrapper">
          <h2>Langkah - Langkah</h2>
          <form>
            <textarea></textarea>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>