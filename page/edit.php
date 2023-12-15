<?php
require_once 'function.php';

$id_Resep = $_GET["id_resep"];
$id_Pengguna = $_GET["id_pengguna"];
$result = $db->query("SELECT * FROM resep WHERE `id_Resep`='$id_Resep' AND `id_Pengguna`='$id_Pengguna'");
$row = $result->fetch_assoc();

$judul = $row["Judul"];
$gambar = $row["image"];
$bahan = $row["Bahan"];
$langkah = $row["Langkah"];

$jumlahBarisBahan = substr_count($bahan, "\n") + 1;
$jumlahBarisLangkah = substr_count($langkah, "\n") + 1;



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

    <link rel="stylesheet" href="../styles/edit.css" />
    <link rel="stylesheet" href="../styles/drag.css" />

</head>

<body>
    <!-- Nav Section -->

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
                                <label for="judul">Judula</label>
                                <input type="text" name="judul" id="judul" value="<?php echo $judul ?>" placeholder="Judul: Nasi Goreng" required />
                            </div>



                            <div class="form__group form__group__full">
                                <label for="bahan">Bahan-bahan</label>
                                <textarea name="bahan" id="bahan" placeholder="1. Tepung 250 gram &#10; &#10;2. Air 300 ml &#10; &#10;3. Bawang 100 gram" cols="30" rows="<?php echo $jumlahBarisBahan?>"  required><?php echo $bahan ?></textarea>
                            </div>

                            <div class="form__group form__group__full">
                                <label for="langkah">Langkah-langkah</label>
                                <textarea name="langkah" id="langkah" cols="30" rows="<?php echo $jumlahBarisLangkah?>" required placeholder="1. Panaskan terlebih dahulu margarin sampai meleleh, lalu orak-arik telur, lalu sisihkan. &#10; &#10;2. Panaskan minyak goreng, kemudian tumis bumbu halus sampai tercium aroma harum.&#10; &#10;3. Tambahkan nasi yang sudah disiapkan ke dalam timisan. Aduk rata bersamaan juga dengan telur dan bumbu halus.&#10; &#10;4. Masukkan daun bawang, aduk kembali."><?php echo $langkah; echo $jumlahBarisLangkah ?></textarea>
                            </div>
                            
                            <input id="confirm" type="hidden" name="submit" value="">

                            <button type="submit"  class="btn primary-btn"onclick="return confirmEdit()">Edit</button>
                            <!-- <button type="submit" name="submit" value="delete" class="btn primary-btn" style="background-color: #ff4c4c;">Delete</button> -->
                            <button type="submit"  class="btn primary-btn" onclick="return confirmDelete()">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../js/edit.js"></script>

</body>

</html>