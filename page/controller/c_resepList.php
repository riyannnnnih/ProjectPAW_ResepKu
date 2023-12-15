<?php
require_once '../../connection.php';
require_once '../model/m_resep.php';

// Create an instance of the model
$modelResep = new ModelResep($db);

// Fetch data from the database using the model method
$resepList = $modelResep->selectAllResep();
