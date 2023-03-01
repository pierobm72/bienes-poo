<?php

use App\Propiedad;
$propiedades = Propiedad::all();
if(strpos($_SERVER["SCRIPT_NAME"],"anuncios") !== false) {
    $propiedades = Propiedad::all();
} else {
    $propiedades = Propiedad::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) { ?>
        <div class="anuncio">
            <picture>
                <img src="<?php echo URL_IMAGENES . $propiedad->imagen ?>" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3><?= $propiedad->titulo ?></h3>
                <p><?php echo truncate($propiedad->descripcion);?></p>
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
                <a href="<?php echo URL_BASE . "/anuncio.php?id={$propiedad->id}" ?>" class="boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido anuncio -->
        </div> <!-- anuncio -->
    <?php } ?>
</div> <!-- contenedor anuncios -->