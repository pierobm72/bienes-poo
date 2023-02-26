<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";


$id= $_GET["id"];
$id  = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header("Location: /");

}

include_once RUTA_APP;

//Conexion a la base de datos
$db = conectarDB();

$query= "SELECT * from propiedades where id=$id";

$resultado = mysqli_query($db,$query);

//Validar que el registro exista en la base de datos
if($resultado->num_rows === 0){
    header("Location: /");

}

$row = mysqli_fetch_assoc($resultado);

incluirTemplates("header");
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?= $row['titulo'] ?></h1>

    <picture>
        <picture>          
            <img loading="lazy" src="<?php echo URL_IMAGENES . "{$row['imagen']}"?>" alt="Imagen de la propiedad">
        </picture>
    </picture>

    <div class="resumen-propiedad">
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

        <p><?= $row['descripcion'] ?></p>
    </div>
</main>

<?php
incluirTemplates("footer");
?>