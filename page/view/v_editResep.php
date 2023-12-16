<?php
require_once '../controller/c_editResep.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Resep</title>
    <!-- aos library css  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="../../styles/edit.css" />
    <link rel="stylesheet" href="../../styles/drage.css" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <!-- Nav Section -->
    <div class="nav">
        <div class="container">
            <div class="nav__wrapper">
                <a href="./index.php" class="logo">
                <!-- <img src="../../images/logo.svg" alt="shaif's cuisine"> -->
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
                        <div class="nav_list_wrapper">
                            <li><a class="nav__link" href="./index.html">Home</a></li>
                            <li><a class="nav__link" href="./resep.php">Resep</a></li>
                            <?php if (isset($_SESSION['id_pengguna'])) {
                                echo "<li class='dropdown btn primary-btn'>
                <a href='#' class='dropbtn'>More</a>
                <div class='dropdown-content'>
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
    <section id="ourSpecials" data-aos="fade-up">
        <div class="container">
            <div class="ourSpecials__wrapper">
                <div class="ourSpecials__item">
                    <div class="form__wrapper">
                        <form name="resep" id="uploadresep" action="" method="POST" enctype="multipart/form-data">
                            <div id="drop-area" class="form__group form__group__full">
                                <label id="gambar" for="file-input">Tambahkan Foto Resep</label>
                                <input type="file" name="file" id="file-input" accept="image/*" style="display: none;">
                                <p id="drop-text">Klik di sini atau seret dan lepas gambar</p>
                                <div id="image-preview" data-gambar="<?php echo $gambar ?>"></div>
                            </div>

                            <div class="form__group form__group__full">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" value="<?php echo $judul ?>" placeholder="Judul: Nasi Goreng" required />
                            </div>



                            <div class="form__group form__group__full">
                                <label for="bahan">Bahan-bahan</label>
                                <textarea name="bahan" id="bahan" placeholder="1. Tepung 250 gram &#10; &#10;2. Air 300 ml &#10; &#10;3. Bawang 100 gram" cols="30" rows="<?php echo $jumlahBarisBahan ?>" required><?php echo $bahan ?></textarea>
                            </div>

                            <div class="form__group form__group__full">
                                <label for="langkah">Langkah-langkah</label>
                                <textarea name="langkah" id="langkah" cols="30" rows="<?php echo $jumlahBarisLangkah ?>" required placeholder="1. Panaskan terlebih dahulu margarin sampai meleleh, lalu orak-arik telur, lalu sisihkan. &#10; &#10;2. Panaskan minyak goreng, kemudian tumis bumbu halus sampai tercium aroma harum.&#10; &#10;3. Tambahkan nasi yang sudah disiapkan ke dalam timisan. Aduk rata bersamaan juga dengan telur dan bumbu halus.&#10; &#10;4. Masukkan daun bawang, aduk kembali."><?php echo $langkah ?></textarea>
                            </div>

                            <input id="confirm" type="hidden" name="submit" value="">

                            <button type="submit" class="btn primary-btn" onclick="return confirmEdit()">Edit</button>
                            <button type="submit" class="btn primary-btn" onclick="return confirmDelete()">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../../script/edit.js"></script>
    <script src="../../script/nav.js"></script>


</body>

</html>