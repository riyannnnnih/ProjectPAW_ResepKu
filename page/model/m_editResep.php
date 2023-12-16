<?php
require_once "../../connection.php";
class ModelEdit
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getResep($id_Resep, $id_Pengguna)
    {
        $result = $this->db->query("SELECT * FROM resep WHERE `id_Resep`='$id_Resep' AND `id_Pengguna`='$id_Pengguna'");
        return $result->fetch_assoc();
    }

    public function editResep($id_Resep, $id_Pengguna,$judul,$bahan,$langkah,$tmpName,$newgambar){
        $result = $this->getResep($id_Resep, $id_Pengguna);
        $gambar = $result['image'];
        if ($gambar!=$newgambar) {
            unlink('../../images/' . $gambar);
            move_uploaded_file($tmpName, '../../images/' . $newgambar);
        }
        $this->db->query("UPDATE `resep` SET `judul`='$judul',`bahan`='$bahan',`langkah`='$langkah',`Waktu_penulisan`=CURRENT_TIMESTAMP,`image`='$newgambar' WHERE `id_Resep`='$id_Resep' AND `id_Pengguna`='$id_Pengguna'");
    }

    public function deleteResep($id_Resep, $id_Pengguna)
    {
        $result = $this->getResep($id_Resep, $id_Pengguna);
        $path_to_delete = '../../images/'.$result['image'];
        unlink($path_to_delete);
        $this->db->query("DELETE FROM resep WHERE`id_resep` = '$id_Resep'  AND `id_Pengguna`='$id_Pengguna'");
    }
}
