<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;

$resultado = $_GET["resultado"] ?? false;


incluirTemplates("header");
?>
<main class="contenedor seccion">
    <?php if (intval($resultado)  === 1) { ?>
        <p class="alerta exito">Propiedad creada correctamente</p>
    <?php } ?>
    <h1>Administrador de bienes raices</h1>
    
    <a href="<?= PROPIEDADES_URL ?>/crear.php" class="boton boton-verde">Crear propiedad</a>  
</main>
<?php
incluirTemplates("footer");
?>