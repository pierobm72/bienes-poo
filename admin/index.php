<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
incluirTemplates("header");
?>

<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear</a>
</main>

<?php
incluirTemplates("footer");
?>