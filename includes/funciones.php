<?php
//Incluir archivo que contiene las rutas de los directorios
include_once($_SERVER['DOCUMENT_ROOT'] . "/rutas.php");

function incluirTemplates(string $nombre, bool $inicio = false)
{
  include RUTA_TEMPLATES . "/{$nombre}.php";
}


/**
 * Funcion que verifica si el admin ha iniciado sesion, si no ha iniciado redirige al home
 */
function estaAutenticado()
{
  session_start();
  if (!$_SESSION["login"]) {
    header("Location: " .URL_BASE);
  }

}

/* Delimitar caracteres */
function truncate(string $texto, int $cantidad = 60): string
{
  if (strlen($texto) >= $cantidad) {
    return substr($texto, 0, $cantidad) . "...";
  } else {
    return $texto;
  }
}


// Imprime los arreglos mas bonitos
function prettyPrint($mensaje, $modo = 0)
{
  if ($modo == 0) {
    echo "<pre>";
    var_export($mensaje);
    echo "</pre>";
  } else {
    echo "<pre>";
    var_dump($mensaje);
    echo "</pre>";
  }


  //Imprimir array en la consola
  $object = json_encode($mensaje);
  print_r('<script>console.log(' . $object . ')</script>');
}

function debuguear($mensaje, $modo = 0)
{
  if ($modo == 0) {
    echo "<pre>";
    var_export($mensaje);
    echo "</pre>";
    exit();
  } else {
    echo "<pre>";
    var_dump($mensaje);
    echo "</pre>";
    exit();
  }

  //Imprimir array en la consola
  $object = json_encode($mensaje);
  print_r('<script>console.log(' . $object . ')</script>');
}

/**
 * Sanitizar el HTML
 * @return string String sanitizado
 */
function s($string) : string{
  $stringSanitisado = htmlspecialchars($string);
  return $stringSanitisado;

}