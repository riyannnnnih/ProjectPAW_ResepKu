<?php
class ModelFavo
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function insertFavo($id_pengguna, $id_resep)
  {
    $query = "INSERT INTO favorit VALUES ('', '$id_pengguna', '$id_resep')";
    mysqli_query($this->db, $query);
  }
}
