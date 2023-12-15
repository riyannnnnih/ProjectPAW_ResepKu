<?php
require_once "../../connection.php";
require_once "../model/m_resep.php";

$modelResep = new ModelResep($db);

// Periksa apakah ID resep telah diberikan
if (isset($_GET['id'])) {
  $id_resep = $_GET['id'];

  // Fetch data from the model
  $resep = $modelResep->getResepById($id_resep);

  // Include the view file
  require '../view/v_readResep.php';
} else {
  echo "ID resep tidak diberikan.";
}
