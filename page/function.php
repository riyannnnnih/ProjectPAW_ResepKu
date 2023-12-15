<?php
require_once '../connection.php';

if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "add") {
        add();
    } else if ($_POST["submit"] == "edit") {
        edit();
    } else if ($_POST["submit"] == "delete") {
        delete();
    } else {
        header("Location:view.php");
    }
}
function add()
{
}
function edit()
{
    global $db;

    $id_Resep = $_GET["id_resep"];
    $id_Pengguna = $_GET["id_pengguna"];

    $result = $db->query("SELECT image FROM resep WHERE `id_Resep`='$id_Resep'AND `id_Pengguna`='$id_Pengguna'");
    $row = $result->fetch_assoc();
    $gambar = $row['image'];
    // $deskripsi = $_POST["deskripsi"];
    $judul = $_POST["judul"];
    $bahan = $_POST["bahan"];
    $langkah = $_POST["langkah"];

    if ($_FILES["file"]["error"] != 4) {
        // $result_select = $db->query("SELECT image FROM resep WHERE `id_Resep`='$id_Resep'  AND `id_Pengguna`='$id_Pengguna'");
        // $row = mysqli_fetch_assoc($result_select);
        // $path_to_delete = $row['image'];
        $path_to_delete = $gambar;
        unlink('../images/' . $path_to_delete);
        @$filename = $_FILES["file"]["name"];
        @$tmpName = $_FILES["file"]["tmp_name"];
        $newfilename = uniqid() . "-" . $filename;
        move_uploaded_file($tmpName, '../images/' . $newfilename);
        $db->query("UPDATE `resep` SET `image`='$newfilename' WHERE `id_Resep`='$id_Resep' AND `id_Pengguna`='$id_Pengguna'");
    } else {
        $newfilename = $gambar;
    }

    $db->query("UPDATE `resep` SET `judul`='$judul',`bahan`='$bahan',`langkah`='$langkah',`Waktu_penulisan`=CURRENT_TIMESTAMP WHERE `id_Resep`='$id_Resep' AND `id_Pengguna`='$id_Pengguna'");
    echo "
    <script> alert('Berhasil Mengupdate');
      document.location.href = 'view.php';
      </script>";
    // header("Location:view.php");
}
function delete()
{
    global $db;

    $id_Resep = $_GET["id_resep"];
    $id_Pengguna = $_GET["id_pengguna"];

    $result_select = $db->query("SELECT image FROM resep WHERE `id_Resep`='$id_Resep'  AND `id_Pengguna`='$id_Pengguna'");
    $row = mysqli_fetch_assoc($result_select);
    $path_to_delete = $row['image'];
    unlink('../images/' . $path_to_delete);

    $db->query("DELETE FROM resep WHERE`id_resep` = '$id_Resep'  AND `id_Pengguna`='$id_Pengguna'");
    echo "
    <script> alert('Berhasil Menghapus');
      document.location.href = 'view.php';
      </script>";
    // header("Location:view.php");

}
