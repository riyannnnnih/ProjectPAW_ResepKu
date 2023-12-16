<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <title>ResepKu</title>
  <link rel="stylesheet" href="../../styles/reset.css">
  <link rel="stylesheet" href="../../styles/globalStyles.css">
  <link rel="stylesheet" href="../../styles/components.css">
  <!-- aos library css  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Add your custom css -->
  <link rel="stylesheet" href="../../styles/home.css">
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
          <ul class="nav__list">
            <div class="nav__close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
            </div>
            <div class="nav__list__wrapper">
              <li><a class="nav__link" href="../index.php">Home</a></li>
              <li><a class="nav__link" href="resep.php">Resep</a></li>
              <li><a class="nav__link" href="favorit.php">Favorit</a></li>
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
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <!-- End Nav Section -->
  <!-- Hero Section -->
  <section id="hero">
    <div class="container">
      <div class="hero__wrapper">
        <div class="hero__left" data-aos="fade-left">
          <div class="hero__left__wrapper">
            <h1 class="hero__heading">ResepKu</h1>
            <p class="hero__info">
            ResepKu adalah sebuah website yang kami buat untuk menyelesaikan tugas akhir mata kuliah Pemrograman Aplikasi Web. Website ini berisi resep-resep makanan dan minuman yang dapat Anda coba di rumah.
            </p>
            <div class="button__wrapper">
              <a href="./resep.php" class="btn primary-btn">Explore Resep</a>
              <?php
              if (isset($_SESSION['id_pengguna'])) {
                echo "<a href='./upload.php' class='btn'>Upload Resep</a>";
              } else {
                echo "<a href='./v_login.php' class='btn'>Upload Resep</a>";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="hero__right" data-aos="fade-right">
          <div class="hero__imgWrapper">
            <img src="../../images/heroImg.png">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->
  <!-- Top Dishes -->
  <?php
  if (!empty($resep)) {
    echo "<section id='dishGrid' data-aos='fade-up'>";
    echo "<div class='container'>";
    echo "<h2 class='dishGrid__title'>";
    echo "Resep-resep yang Mungkin Anda Sukai";
    echo "</h2>";
    echo "<div style='max-width: 350px; max-height: 350px;' class='dishGrid__wrapper'>";
    foreach ($resep as $item) {
      echo '<div class="dishGrid__item">';
      echo '<div class="dishGrid__item__img">';
      echo '<img src="../../images/' . $item['image'] . '" alt="food img">';
      echo '</div>';
      echo '<div class="dishGrid__item__info">';
      echo '<h3 class="dishGrid__item__title">' . $item['Judul'] . '</h3>';
      echo '<p class="dishGrid__item__desc">' . $item['Bahan'] . '</p>';
      echo '</div>';
      echo '</div>';
    }
    echo "</div>";
    echo "</div>";
    echo "</section>";
  }
  ?>
  <!-- End Top Dishes -->
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
              <a href="../index.php">Home</a>
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

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="../styles/main.js"></script>
  <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>

</html>