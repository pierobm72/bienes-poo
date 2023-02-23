<?php 

// DIRECTORIOS PARA PHP

//Ruta que contiene el directorio raiz
define('RUTA_RAIZ', $_SERVER['DOCUMENT_ROOT']);

//Ruta que contiene la carpeta "includes"
define('RUTA_INCLUDES', RUTA_RAIZ . "/includes");

//Ruta que contiene la carpeta donde estan los templates
define('RUTA_TEMPLATES', RUTA_RAIZ . "/includes/templates");

//Ruta que contiene la carpeta donde estan los funciones
define('RUTA_FUNCIONES', RUTA_RAIZ . "/includes/funciones.php");

//Ruta que contiene la conexion a la base de datos
define('RUTA_BASEDATOS', RUTA_RAIZ . "/includes/config/database.php");


//Ruta que contiene carpeta de imagenes que se sube por el formulario
define('RUTA_IMAGENES', RUTA_RAIZ . "/imagenes/");


//DIRECTORIOS PARA HTML

//Obtener la url del dominio. Ejemplo : https://www.domiminioactual.com
$url_actual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
define('BASE_URL', $url_actual);

//Ruta que contiene la carpeta propiedades
define('PROPIEDADES_URL', BASE_URL . "/admin/propiedades");


//Ruta que contiene la carpeta propiedades
define('ADMIN_URL', BASE_URL . "/admin");



//Ruta que contiene la carpeta propiedades
define('IMAGENES_URL', BASE_URL . "/imagenes/");


