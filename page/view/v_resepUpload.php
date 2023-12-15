<?php require_once '../controller/c_upload.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Resep</title>
  <link rel="stylesheet" href="../../styles/style.css">
  <link rel="stylesheet" href="../../styles/drag.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

  <a id="back" href="/ProjectPaw/ProjectPAW_ResepKu/page/view/v_resepList.php">
    <img src="../../asset/arrow-back.svg">
  </a>
  <div class="container-1">
    <div>
      <h1 id="upload-title">Upload Resep</h1>
    </div>
    <div class="container-2">
      <div class="img-container">
        <form action="../controller/c_upload.php" method="post" id="formUpload" enctype="multipart/form-data">
          <div id="drag-container">
            <label for="inputFile" id="drop-area">
              <input type="file" accept=".jpg, .png, .jpeg" id="inputFile" name="image" hidden>
              <div id="img-view">
                <img src="../../asset/upload-logo.png" alt="">
                <p>Drag and Drop or click here <br> to upload image</p>
              </div>
            </label>
          </div>
      </div>
      <div class="formContainer">
        <div class="inputForm">
          <input type="text" name="judulResep" id="judulResep" class="inputResep" placeholder="Judul Resep..." required>
          <input type="text" name="bahanResep" id="bahanResep" class="inputResep" placeholder="Bahan Resep..." required>
          <h2>Langkah - Langkah</h2>
          <textarea name="langkahResep" id="langkahResep" class="inputResep" placeholder="Langkah Resep..." required></textarea>
        </div>
        <input type="submit" name="submit" id="submitResep">
        </form>
      </div>
    </div>
  </div>
  <script src="../../script/drag.js"></script>
</body>

</html>