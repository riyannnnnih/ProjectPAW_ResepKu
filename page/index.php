<?php
session_start();
include_once("c_index.php");

$controller = new index();

$controller->invoke();