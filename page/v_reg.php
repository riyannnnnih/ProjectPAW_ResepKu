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
        <a href="./index.php" class="logo">
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
              <li><a class="nav__link" href="./index.php">Home</a></li>
              <li><a class="nav__link" href="./resep.php">Resep</a></li>
              <li><a class="nav__link" href="favorit.php">Favorit</a></li>
              <?php if (isset($_SESSION['id_pengguna'])) {
                echo "<li class='dropdown btn primary-btn'>
                <a href='#' onclick='myFunction()' class='dropbtn'>More</a>
                <div id='myDropdown' class='dropdown-content'>
                  <a href='#'>Upload Resep</a>
                  <a href='logout.php'>Log Out</a>
                </div>
              </li>";
              } else {
                echo "<li><a href='./login.php' class='btn primary-btn'>Login</a></li>";
              } ?>
            </div>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- End Nav Section -->
  <!-- Booking Section -->
  <section id="form" data-aos="fade-up">
    <div class="container">
      <h3 class="form__title">Sign Up</h3>
      <div class="form_login">
        <form action="reg.php" method="post" enctype="multipart/form-data">
          <div class="form__group form__group__full">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
          </div>
          <div class="form__group form__group__full">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form__group form__group__full">
            <label for="foto">Profile Picture</label>
            <input class="btn primary-btn" type="file" name="foto" id="foto" placeholder="Upload your profile picture">
          </div>
          <div class="form__group form__group__full">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
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
          <p style="margin-top: .5rem;">Sudah punya akun? <a href="login.php">Sign In</a></p>
        </form>
      </div>
    </div>
  </section>
  <!-- End Booking Section -->
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer__wrapper">
        <div class="footer__col1">
          <div class="footer__logo">
            <img src="./images/logo.svg" alt="shaif's cuisine">
          </div>
          <p class="footer__desc">
            Fresh and delicious traditional Bangladeshi food to delight the whole family.
          </p>
          <div class="footer__socials">
            <h4 class="footer__socials__title">Follow us</h4>
            <ol class="footer__socials__list">
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                  </svg>
                </a>
              </li>
            </ol>
          </div>
        </div>
        <div class="footer__col2">
          <h3 class="footer__text__title">
            Links
          </h3>
          <ol class="footer__text">
            <li>
              <a href="/index.html">Home</a>
            </li>
            <li>
              <a href="./menu.html">Menu</a>
            </li>
            <li>
              <a href="./booking.html">Book Table</a>
            </li>
            <li>
              <a href="./about.html">About Us</a>
            </li>
            <li>
              <a href="./contact.html">contact Us</a>
            </li>
            <li>
              <a href="#">Privacy Policy</a>
            </li>
          </ol>
        </div>
        <div class="footer__col3">
          <h3 class="footer__text__title">
            Support
          </h3>
          <ol class="footer__text">
            <li>
              <a href="#">Contact</a>
            </li>
            <li>
              <a href="#">Support Center</a>
            </li>
            <li>
              <a href="#">Feedback</a>
            </li>
          </ol>
        </div>
        <div class="footer__col4">
          <h3 class="footer__text__title">
            Contact
          </h3>
          <ol class="footer__text">
            <li>
              <a href="#">+880123</a>
            </li>
            <li>
              <a href="#">webcifar@gmail.com</a>
            </li>
            <li>
              <a href="#">GEC Circle, Chittagong, Bangladesh</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </footer>
  <div id="copyright">
    <div class="container">
      <p class="copyright__text">
        © copyright 2021 Shaif’s Cuisine | All rights reserved
      </p>
    </div>
  </div>
  <!-- End Footer -->

  <!-- aos scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom scripts -->
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