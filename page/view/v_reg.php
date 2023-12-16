<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <title>Sign In</title>
  <link rel="stylesheet" href="../styles/reset.css">
  <link rel="stylesheet" href="../styles/globalStyles.css">
  <link rel="stylesheet" href="../styles/components.css">
  <!-- aos library css  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
              <li><a class="nav__link" href="./resep.php">Resep</a></li>
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
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- End Nav Section -->
  <!-- Sign Up Section -->
  <section id="form" data-aos="fade-up">
    <div class="container">
      <h3 class="form__title">Sign Up</h3>
      <div class="form_login">
        <form action="../index.php" method="post" enctype="multipart/form-data">
          <div class="form__group form__group__full">
            <label for="username">Username</label>
            <input type="text" name="regUsername" id="username" placeholder="Enter your username" required>
          </div>
          <div class="form__group form__group__full">
            <label for="email">Email</label>
            <input type="email" name="regEmail" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form__group form__group__full">
            <label for="foto">Profile Picture</label>
            <input class="btn primary-btn" type="file" name="foto" id="foto" placeholder="Upload your profile picture">
          </div>
          <div class="form__group form__group__full">
            <label for="password">Password</label>
            <input type="password" name="regPassword" id="password" placeholder="Enter your password" required>
          </div>
          <?php
          if (isset($_SESSION['error_password'])) {
            if ($_SESSION['error_password']) {
              echo "<h1>Password sudah terdaftar</h1>";
              session_destroy();
            } else if ($_SESSION['error_email']) {
              echo "<h1>Email telah terdaftar</h1>";
              session_destroy();
            } else if ($_SESSION['error_username']) {
              echo "<h1>Username sudah terdaftar</h1>";
              session_destroy();
            }
          } ?>
          <button type="submit" class="btn primary-btn">Sign Up</button>
          <?php
          if (isset($_SESSION['error_pass'])) {
            if ($_SESSION['error_pass']) {
              echo "<h1>Password salah</h1>";
              session_destroy();
            } else if ($_SESSION['error_email']) {
              echo "<h1>Email belum terdaftar</h1>";
              session_destroy();
            }
          } ?>
          <p style="margin-top: .5rem;">Sudah punya akun? <a href="./v_login.php">Sign In</a></p>
        </form>
      </div>
    </div>
  </section>
  <!-- End Sign Up Section -->
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
              <a href="./index.php">Home</a>
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

  <!-- aos scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom scripts -->
  <script src="../../script/main.js"></script>
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