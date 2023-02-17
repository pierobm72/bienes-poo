<?php 
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