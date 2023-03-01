<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
require RUTA_FUNCIONES;
require RUTA_BASEDATOS;
require RUTA_AUTOLOAD;

use App\ActiveRecord;

//Conectarse a la base de datos
$db = conectarDB();

//Colocar la conexion a la base de datos en la clase
ActiveRecord::setDB($db);
