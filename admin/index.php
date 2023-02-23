<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
require_once RUTA_BASEDATOS;

//Importar la conexion
$db = conectarDB();

//Escribir el query
$query = "SELECT * FROM propiedades";

//Consultar a la base de datos
$resultado = mysqli_query($db,$query);

//Mostrar mensaje condicional
$mensaje = $_GET["resultado"] ?? false;

incluirTemplates("header");
?>
<main class="contenedor seccion">
    <?php if (intval($mensaje)  === 1) { ?>
        <p class="alerta exito">Propiedad creada correctamente</p>
    <?php } ?>
    <h1>Administrador de bienes raices</h1>
    
    <a href="<?= PROPIEDADES_URL ?>/crear.php" class="boton boton-verde">Crear propiedad</a>  

    <table class="propiedades">
        <thead>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <!-- Mostrar los resultados con php -->
        <tbody> 
            <?php while($row = mysqli_fetch_assoc($resultado)) { ?>            
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["titulo"] ?></td>
                <td><img src="<?php echo IMAGENES_URL .  $row["imagen"]?>" class="imagen-tabla"></td>
                <td>$<?= $row["precio"] ?></td>
                <td>
                    <a href="" class="boton-rojo-block">Eliminar</a>
                    <a href="" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</main>
<?php
incluirTemplates("footer");
?>