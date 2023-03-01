<?php

use App\Propiedad;

include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;


$id= $_GET["id"];
$id  = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){ header("Location: /");}


$propiedad = Propiedad::find($id);

incluirTemplates("header");
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?= $propiedad->titulo ?></h1>

    <picture>
        <picture>          
            <img loading="lazy" src="<?php echo URL_IMAGENES . "{$propiedad->imagen}"?>" alt="Imagen de la propiedad">
        </picture>
    </picture>

    <div class="resumen-propiedad">
        <p class="precio"><?= $propiedad->precio ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                <p><?= $propiedad->wc ?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                <p><?= $propiedad->estacionamiento ?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg " alt="icono habitaciones" loading="lazy">
                <p><?= $propiedad->habitacion ?></p>
            </li>
        </ul>

        <p><?= $propiedad->descripcion ?></p>
    </div>
</main>

<?php
incluirTemplates("footer");
?>