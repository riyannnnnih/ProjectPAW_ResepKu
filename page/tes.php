<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styles/drag.css">
</head>

<body>
  <div id="drag-container">
    <label for="inputFile" id="drop-area">
      <input type="file" accept="image/*" id="inputFile" hidden>
      <div id="img-view">
        <img src="../asset/upload-file.png" alt="">
        <p>Drag and Drop or click here <br> to upload image</p>
      </div>
    </label>
  </div>
  <script src="../script/drag.js"></script>
</body>

</html>