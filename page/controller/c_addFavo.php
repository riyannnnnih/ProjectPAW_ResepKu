<?php
require_once '../model/m_favorite.php';
require_once '../../connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  session_start();

  // Sanitize and validate the input
  $id_resep = isset($_GET['id']) ? intval($_GET['id']) : 0;

  // Check if the ID is valid (you might want to add more validation)
  if ($id_resep > 0) {
    $modelObj = new ModelFavo($db);

    $id_pengguna = $_SESSION['id_pengguna'];

    // Call the insertFavo method from your model
    $modelObj->insertFavo($id_pengguna, $id_resep);

    // Return a response if needed
    $response = ['status' => 'success', 'message' => 'Favorite added successfully'];
    echo json_encode($response);
  } else {
    // Return an error response if the ID is not valid
    $response = ['status' => 'success', 'message' => 'Invalid recipe ID'];
    echo json_encode($response);
  }
} else {
  // Return an error response for non-POST requests
  $response = ['status' => 'success', 'message' => 'Invalid request method'];
  echo json_encode($response);
}
