<?php require_once "../controller/c_resepList.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ARYA YUDHA KUSUMA PRANATA -->
  <!-- 225150701111015 -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Makanan</title>
  <link rel="stylesheet" href="../../styles/resep-card.css">
  <link rel="stylesheet" href="../../styles/components.css">
</head>

<body>

  <!-- Nav Section -->
  <div class="nav">
    <div class="container">
      <div class="nav__wrapper">
        <a href="../index.php" class="logo">
          <h1>ResepKu</h1>
        </a>
        <nav>
          <div class="nav__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
          </div>
          <div class="nav__bgOverlay"></div>
          <ol class="nav__list">
            <div class="nav__close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
            </div>
            <div class="nav__list__wrapper">
              <li><a class="nav__link" href="../index.php">Home</a></li>
              <li><a class="nav__link" href="./v_resepList.php">Resep</a></li>
              <li><a class="nav__link" href="./v_readFavo.php">Favorit</a></li>
              <?php if (isset($_SESSION['id_pengguna'])) {
                echo "<li class='dropdown btn primary-btn'>
                <a href='#' onclick='myFunction()' class='dropbtn'>More</a>
                <div id='myDropdown' class='dropdown-content'>
                  <a href='#'>Upload Resep</a>
                  <a href='../logout.php'>Log Out</a>
                </div>
              </li>";
              } else {
                echo "<li><a href='./v_login.php' class='btn primary-btn'>Login</a></li>";
              } ?>
            </div>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- End Nav Section -->

  <div id="upload-menu">
    <a href="v_resepUpload.php" id="ref-upload">
      <div id="upload-img">
        <img src="../../asset/add-512.png">
        Buat resep kamu sekarang!
      </div>
    </a>
  </div>
  <p id="judul">Daftar Resep</p>
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

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer__wrapper">
        <div class="footer__col1">
          <div class="footer__logo">
            <h1 style="font-size: 3rem;">ResepKu</h1>
          </div>
          <p class="footer__desc">
            ResepKu adalah sebuah website yang kami buat untuk menyelesaikan tugas akhir mata kuliah Pemrograman Aplikasi Web. Website ini berisi resep-resep makanan dan minuman yang dapat Anda coba di rumah.
          </p>
        </div>
        <div class="footer__col2">
          <h3 class="footer__text__title">
            Links
          </h3>
          <ol class="footer__text">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="./resep.php">Resep</a>
            </li>
            <li>
              <a href="./favorit.php">Favorit</a>
            </li>
          </ol>
        </div>
        <div class="footer__col3">
          <h3 class="footer__text__title">
            Anggota
          </h3>
          <ol class="footer__text">
            <li>
              <a href="#">Arya Yudha Kusuma P</a>
            </li>
            <li>
              <a href="#">Meisha Putradewan</a>
            </li>
            <li>
              <a href="#">Muhammad Andra Dzaki</a>
            </li>
            <li>
              <a href="#">Fauzi Mahardika K</a>
            </li>
            <li>
              <a href="#">Urdha Egha Kirana</a>
            </li>
          </ol>
        </div>
        <div class="footer__col4">
          <h3 class="footer__text__title">
            NIM
          </h3>
          <ol class="footer__text">
            <li>
              <a href="#">225150701111015</a>
            </li>
            <li>
              <a href="#">225150700111024</a>
            </li>
            <li>
              <a href="#">225150701111003</a>
            </li>
            <li>
              <a href="#">225150707111071</a>
            </li>
            <li>
              <a href="#">225150701111007</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </footer>
  <div id="copyright">
    <div class="container">
      <p class="copyright__text">
        © Kelompok 3 Pemrograman Aplikasi Web TI-C 2023
      </p>
    </div>
  </div>
  <!-- End Footer -->
</body>

</html>