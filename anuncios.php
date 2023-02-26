<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;
incluirTemplates("header");
?>
    </header>

    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>
        <?php include RUTA_TEMPLATES . "/anuncios.php"?>
    </main>

<?php
incluirTemplates("footer");
?>