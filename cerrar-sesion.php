<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
session_start();

$_SESSION = [];

header("Location: " . URL_BASE);