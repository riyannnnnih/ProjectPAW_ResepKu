<?php require_once '../../connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="../../styles/resepSaya.css" />
</head>

<body>
  <div class="main-container">
    <div class="box">
      <div class="wrapper"><span class="text">Dapatkan App</span></div>
      <div class="pic"></div>
      <span class="text-2">Logo</span>
      <div class="pic-2"></div>
      <div class="pic-3"></div>
      <div class="img"></div>
      <div class="pic-4"></div>
      <div class="img-2"></div>
      <span class="text-3">Premium</span><span class="text-4">Aktivitas</span><span class="text-5">Beranda</span><span class="text-6">Profil</span><span class="text-7">Cari</span><span class="text-8">Buat</span>
    </div>
    <div class="wrapper-2">
      <div class="section">
        <span class="text-9">Kamu belum Berlangganan Premium</span><span class="text-a">Langganan untuk hemat waktu menemukan resep populer</span>
      </div>
      <div class="img-3"></div>
      <div class="img-4"></div>
    </div>
    <div class="group">
      <div class="img-5"></div>
      <div class="pic-5"></div>
      <div class="pic-6"></div>
      <div class="pic-7"></div>
      <span class="text-b">Ketty Smith</span><span class="text-c">@ket_145</span>

      <div class="section-2">
        <a href="profilPublik.php"><span class="text-d">Lihat Profil Publik</span>
      </div></a>

    </div>
    <div class="section-3">
      <div class="section-4">
        <div class="pic-8"></div>
        <div class="pic-9"></div>
      </div>
      <a href="resepSaya.php"><span class="text-e">Resep Saya</span> </a>

      <a href="tersimpan.php"><span class="text-f">Tersimpan</span></a>
      <a href="cookbook.php"><span class="text-10">Cookbook</span></a>
      <a href="cooksnap.php"><span class="text-11">Cooksnap</span></a>
      <a href="tips.php"><span class="text-12">Tips</span></a>

      <div class="group-2">

        <div class="group-3">
          <table style="    background: #ededed" border=1 cellpadding=35 cellspacing=0>
            <tr>
              <td>id pengguna</td>

              <td>id resep</td>
              <td>judul</td>
              <td>foto resep</td>
              <td>aksi</td>

            </tr>
            <?php
            $users = $db->query("select * from resep");

            $i = 1;

            foreach ($users as $user) {
              $gambar = "../../images/" . $user["image"];
            ?>
              <tr>
                <td><?php echo $user['Id_pengguna'] ?></td>

                <td><?php echo $user['Id_resep'] ?></td>
                <td><?php echo $user["Judul"]; ?></td>
                <td><img src="../../images/<?php echo $user["image"]; ?>" width="200"></td>
                <td>
                  <a href="v_editResep.php?id_resep=<?php echo $user['Id_resep']; ?>&id_pengguna=<?php echo $user['Id_pengguna']; ?>">Edit</a>
                  </form>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>
        </div>

        <!-- <div class="section-5">
          <div class="pic-a"></div>
          <div class="pic-b"></div>
        </div> -->
      </div>
    </div>


  </div>

</body>

</html>
