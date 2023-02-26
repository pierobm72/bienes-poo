<?php

/**
 * 
 * Funcion para conectarse a la base de datos
 * @return mysqli Objeto que representa la conexion a la base de datos
 */
function conectarDB() : mysqli
{
  $db = new mysqli("localhost", "root", "", "bienes_espagueti");

  if (!$db) {
    echo "Error no se pudo conectar";    
    exit;
  }

  return $db;
  
}
