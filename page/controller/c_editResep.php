<?php
require_once '../../connection.php';
require_once '../model/m_editResep.php';

$modelEdit = new ModelEdit($db);

$id_Resep = $_GET["id_resep"];
$id_Pengguna = $_GET["id_pengguna"];

$row = $modelEdit->getResep($id_Resep, $id_Pengguna);

$judul = $row["Judul"];
$gambar = $row["image"];
$bahan = $row["Bahan"];
$langkah = $row["Langkah"];

$jumlahBarisBahan = substr_count($bahan, "\n") + 1;
$jumlahBarisLangkah = substr_count($langkah, "\n") + 1;

if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "add") {
        // add();
    } else if ($_POST["submit"] == "edit") {
        // edit();
        $judul = $_POST["judul"];
        $bahan = $_POST["bahan"];
        $langkah = $_POST["langkah"];
        if ($_FILES["file"]["error"] != 4) {
            @$filename = $_FILES["file"]["name"];
            @$tmpName = $_FILES["file"]["tmp_name"];
            $newfilename = uniqid() . "-" . $filename;
            move_uploaded_file($tmpName, '../../images/' . $newfilename);
        } else {
            $newfilename = $gambar;
        }
        $modelEdit->editResep($id_Resep, $id_Pengguna,$judul,$bahan,$langkah,$tmpName,$newfilename);
        echo "
        <script> alert('Berhasil Mengupdate');
          document.location.href = 'v_resepku.php';
          </script>";

    } else if ($_POST["submit"] == "delete") {
        $modelEdit->deleteResep($id_Resep, $id_Pengguna);
        echo "
                <script> alert('Berhasil Menghapus');
                       document.location.href = 'v_resepku.php';
                </script>";
    } else {
        header("Location:v_resepku.php");
    }
}
