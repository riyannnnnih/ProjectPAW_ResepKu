<?php
require_once "../../connection.php";
class ModelResep
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function insertResep($judul, $bahan, $langkah, $id_pengguna, $uniqImageName)
  {
    $query = "INSERT INTO resep VALUES ('', '$judul', '$bahan', '$langkah', CURRENT_TIMESTAMP(), '$id_pengguna', '$uniqImageName')";
    mysqli_query($this->db, $query);
  }

  public function selectAllResep()
  {
    $result = $this->db->query("SELECT * FROM RESEP");
    $resepList = [];
    while ($row = $result->fetch_object()) {
      $resepList[] = $row;
    }
    return $resepList;
  }


  public function getResepById($id_resep)
  {
    $result = $this->db->query("SELECT * FROM RESEP WHERE Id_resep = $id_resep");

    if ($result->num_rows > 0) {
      return $result->fetch_object();
    } else {
      return false;
    }
  }
  // Additional methods for fetching multiple users, searching, etc. can be added as needed
}
