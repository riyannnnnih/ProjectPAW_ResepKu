<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Resep</title>
  <link rel="stylesheet" href="../../styles/resep-detail.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
              <li><a class="nav__link" href="../view/v_resepList.php">Resep</a></li>
              <li><a class="nav__link" href="../view/v_readFavo.php">Favorit</a></li>
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

  <a id="back" href="/ProjectPaw/ProjectPAW_ResepKu/page/view/v_resepList.php">
    <img src="../../asset/arrow-back.svg">
  </a>
  <div class="resep-container">
    <?php if ($resep) : ?>
      <h1><?php echo $resep->Judul; ?></h1>
      <img src='../../images/<?php echo $resep->image; ?>' width='200'>
      <div id="nama-fave">
        <div id="nama-tgl">
          <p>Oleh <?php echo $resep->Username ?></p>
          <p id="time"><?php echo $resep->Waktu_penulisan ?></p>
        </div>
        <button id="favorit-btn" onclick="addFavorite('<?php echo $resep->Id_resep ?>')">
          <img src="../../asset/3187778-200.png">
          <p>Favorit</p>
        </button>
      </div>
      <h3>Bahan:</h3>
      <p><?php echo $resep->Bahan; ?></p>
      <h3>Langkah:</h3>
      <div id="langkah">
        <p><?php echo nl2br($resep->Langkah); ?></p>
      </div>
    <?php else : ?>
      <p>Resep tidak ditemukan.</p>
    <?php endif; ?>
  </div>
  <script src="../../script/drag.js"></script>
  <script src="../../script/addFavo.js"></script>
</body>

</html>