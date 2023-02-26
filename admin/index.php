<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;
estaAutenticado();



//Importar la conexion
$db = conectarDB();

//Escribir el query
$query = "SELECT * FROM propiedades";

//Consultar a la base de datos
$resultado = mysqli_query($db, $query);

//Mostrar mensaje condicional
$mensaje = $_GET["resultado"] ?? false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

    if ($id) {
        //Eliminar imagen del server
        $query = "SELECT imagen from propiedades where id=$id";        
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink(RUTA_IMAGENES . $propiedad["imagen"]);

        //Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id=$id";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header("Location: /admin?resultado=3");
        }
    }
}

incluirTemplates("header");
?>
<main class="contenedor seccion">
    <?php if (intval($mensaje)  === 1) { ?>
        <p class="alerta exito">Propiedad creada correctamente</p>
    <?php } elseif (intval($mensaje)  === 2) { ?>
        <p class="alerta exito">Propiedad actualizada correctamente</p>
    <?php } elseif (intval($mensaje)  === 3) { ?>
        <p class="alerta exito">Propiedad eliminada correctamente</p>
    <?php } ?>
    <h1>Administrador de bienes raices</h1>

    <a href="<?= URL_PROPIEDADES ?>/crear.php" class="boton boton-verde">Crear propiedad</a>

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
            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["titulo"] ?></td>
                    <td><img src="<?php echo URL_IMAGENES .  $row["imagen"] ?>" class="imagen-tabla"></td>
                    <td>$<?= $row["precio"] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <button class="boton-rojo-block w-100 m-0" type="submit">Eliminar</button>
                        </form>
                        <a href="<?php echo URL_PROPIEDADES . "/actualizar.php?id={$row['id']}" ?>" class="boton-amarillo-block m-0">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>
<?php
incluirTemplates("footer");
?>