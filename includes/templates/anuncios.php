<?php

//Base de datos
$db = conectarDB();

//Consultar
if(isset($limite)){
    $query = "SELECT * FROM propiedades LIMIT $limite";
} else {
    $query = "SELECT * FROM propiedades";
}

//Obtener resultados
$resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
        <div class="anuncio">
            <picture>
                <img src="<?php echo URL_IMAGENES . $row["imagen"] ?>" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3><?= $row['titulo'] ?></h3>
                <p><?php echo truncate($row['descripcion']);?></p>
                <p class="precio"><?= $row['precio'] ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p><?= $row['wc'] ?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p><?= $row['estacionamiento'] ?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg " alt="icono habitaciones" loading="lazy">
                        <p><?= $row['habitacion'] ?></p>
                    </li>
                </ul>
                <a href="<?php echo URL_BASE . "/anuncio.php?id={$row['id']}" ?>" class="boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido anuncio -->
        </div> <!-- anuncio -->
    <?php } ?>
</div> <!-- contenedor anuncios -->