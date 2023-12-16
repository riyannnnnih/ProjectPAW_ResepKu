<?php
require_once '../../connection.php';
require_once '../model/m_resep.php';

session_start();

// $id_pengguna = $_SESSION['id_pengguna'];
// Create an instance of the model
$modelResep = new ModelResep($db);

// Set the number of items per page
$itemsPerPage = 6;

// Get the total number of recipes
$totalRecipes = $modelResep->countAllFavo(1);

// Calculate the total number of pages
$totalPages = intval($totalRecipes / $itemsPerPage);

// Get the current page from the query parameter, default to page 1
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Fetch data from the model with pagination
$offset = ($currentpage - 1) * $itemsPerPage;
$resepList = $modelResep->selectFavoWithPagination(1, $itemsPerPage, $offset);
