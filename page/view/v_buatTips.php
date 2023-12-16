<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" />
    <link rel="stylesheet" href="buatTips.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="group">
        <div class="box">
          <a href="verifTips.php">
            <span class="text">Terbitkan</span>
          </a>
        </div>
        <div class="pic"></div>
        <span class="text-2">Logo</span><span class="text-3">Hapus</span>
      </div>
      <div class="section">
        <!-- Formulir untuk Judul -->
        <input type="text" id="judulInput" class="box-2" placeholder="Judul: Cara Memotong Bawang Bombay">

        <!-- Formulir untuk Deskripsi -->
        <textarea id="deskripsiInput" class="box-3" placeholder="Mis: Untuk memotong bawang bombay, mulailah dengan membelah bawang jadi dua dari arah atas ke bawah...."></textarea>

        <div class="group-2">
          <!-- Formulir untuk Unggah Foto -->
          <label for="fotoInput" class="pic-2"></label>
          <input type="file" id="fotoInput" accept="image/*" style="display: none;">
          <span class="text-6" onclick="document.getElementById('fotoInput').click()">Tambah foto</span>
          <span class="text-7">untuk memperjelas tips</span>

          <!-- Menampilkan gambar yang diunggah -->
          <img id="gambarUnggahan" style="display: none;">
        </div>

        <div class="group-3">
          <div class="img"></div>
          <span class="text-8">Langkah</span>
        </div>
      </div>
    </div>

    <script>
      // Menangani perubahan pada input file foto
      document.getElementById('fotoInput').addEventListener('change', function() {
        // Mendapatkan file yang diunggah
        var file = this.files[0];

        // Membaca file sebagai URL data
        var reader = new FileReader();
        reader.onload = function(e) {
          // Menampilkan gambar di halaman web
          document.getElementById('gambarUnggahan').src = e.target.result;
          document.getElementById('gambarUnggahan').style.display = 'block';
        };
        reader.readAsDataURL(file);
      });
    </script>
  </body>
</html>
