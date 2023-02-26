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

//Ruta que contiene el autoload
define('RUTA_AUTOLOAD', RUTA_RAIZ . "/vendor/autoload.php");


//Ruta que contiene el autoload
define('RUTA_APP', RUTA_RAIZ . "/includes/app.php");


//DIRECTORIOS PARA HTML

//Obtener la url del dominio. Ejemplo : https://www.domiminioactual.com
$url_actual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
define('URL_BASE', $url_actual);

//Ruta que contiene la carpeta propiedades
define('URL_PROPIEDADES', URL_BASE . "/admin/propiedades");


//Ruta que contiene la carpeta propiedades
define('URL_ADMIN', URL_BASE . "/admin");

//Ruta que contiene la carpeta propiedades
define('URL_IMAGENES', URL_BASE . "/imagenes/");


