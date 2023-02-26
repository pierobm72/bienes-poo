<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

$db = conectarDB();

$email = "admin@admin.com";
$password = "admin";

//Hashear password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";
echo $query;
exit;

//Insertar en la base de datos
$resultado = mysqli_query($db,$query);


