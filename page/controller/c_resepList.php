<?php
require_once '../../connection.php';
require_once '../model/m_resep.php';

// Create an instance of the model
$modelResep = new ModelResep($db);

// Set the number of items per page
$itemsPerPage = 6;

// Get the total number of recipes
$totalRecipes = $modelResep->countAllResep();

// Calculate the total number of pages
$totalPages = ceil($totalRecipes / $itemsPerPage);

// Get the current page from the query parameter, default to page 1
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Fetch data from the model with pagination
$offset = ($currentpage - 1) * $itemsPerPage;
$resepList = $modelResep->selectResepWithPagination($itemsPerPage, $offset);
