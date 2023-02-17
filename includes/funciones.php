<?php 
//Incluir archivo que contiene las rutas de los directorios
include_once ($_SERVER['DOCUMENT_ROOT'] . "/rutas.php"); 

function incluirTemplates(string $nombre, bool $inicio = false){
  include RUTA_TEMPLATES . "/{$nombre}.php";
}