<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
  <link rel="stylesheet" href="verifTips.css" />
</head>
<body>
  <div class="main-container">
    <div class="wrapper">
      <div class="wrapper-2"><span class="text">Dapatkan App</span></div>
      <div class="img"></div>
      <span class="text-2">Logo</span>
      <div class="pic"></div>
      <div class="pic-2"></div>
      <div class="img-2"></div>
      <div class="pic-3"></div>
      <div class="pic-4"></div>
      <span class="text-3">Premium</span>
      <span class="text-4">Aktivitas</span
      ><span class="text-5">Beranda</span>  <a href="tersimpan.php"><span class="text-6">Profil</span></a>
      <span class="text-7">Cari</span><span class="text-8">Buat</span>
    </div>
    <div class="section">
      <span class="text-9">Tips berhasil diterbitkan!</span>
    </div>
    <div class="group">
      <div class="section-2">
        <div class="box"><span class="text-a">Edit</span></div>
        <div class="pic-5"></div>
        <span class="text-b">Hapus</span>
      </div>
      <div class="wrapper-3"></div>
      <span class="text-c">Cara Membuat Es Madu Ketan</span><span class="text-d">Masukkan madu di akhir langkah, karena akan menambah rasa nikmat</span>
      <div class="box-2"></div>
      <span class="text-e">Langkah 2</span>
      <div class="pic-6"></div>
      <div class="wrapper-4"></div>
      <div class="img-3"></div>
      <div class="section-3">
        <span class="text-f">Diterbitkan oleh <br /></span
        ><span class="text-10">Ketty Smith <br /></span
        ><span class="text-11">pada 16 Desember 2023</span>
      </div>
      <div class="section-4"></div>
      <div class="box-3">
        <span class="text-12">Komentar</span>
        <div class="img-4"></div>
      </div>
      <div class="section-5">
        <div class="pic-7"></div>
        <div class="section-6">
         
          <!-- Formulir Komentar -->
          <form id="commentForm" class="comment-form">
            <input type="text" id="commentInput" placeholder="Masukkan komentar Anda">
            <div class="pic-8" id="sendButton"></div>
          </form>
        </div>
      </div>

      <!-- Konfirmasi Komentar -->
      <div id="confirmationMessage"></div>

      <script>
        // Menangani klik pada tombol kirim
        document.getElementById('sendButton').addEventListener('click', function() {
          // Mendapatkan nilai komentar dari input
          var commentValue = document.getElementById('commentInput').value;

          // Memeriksa apakah komentar tidak kosong
          if (commentValue.trim() !== "") {
            // Menampilkan konfirmasi
            var confirmationMessage = document.getElementById('confirmationMessage');
            confirmationMessage.innerHTML = 'Komentar berhasil dikirim: ' + commentValue;

            // Dapat dihapus setelah beberapa detik (opsional)
            setTimeout(function() {
              confirmationMessage.innerHTML = '';
            }, 3000);

            // Di sini, Anda dapat mengirim komentar ke server atau melakukan tindakan lain sesuai kebutuhan
          } else {
            // Menampilkan pesan jika komentar kosong
            alert('Komentar tidak boleh kosong!');
          }
        });
      </script>
    </div>
  </div>
</body>
</html>
