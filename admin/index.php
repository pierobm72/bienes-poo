<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

//Implementar metodo para obtener todas las propiedades
$propiedades = Propiedad::all();

//Mostrar mensaje condicional
$mensaje = $_GET["resultado"] ?? false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

    if ($id) {
        $propiedad = Propiedad::find($id);

        $propiedad->eliminar();
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

    <a href="<?= URL_PROPIEDADES ?>crear.php" class="boton boton-verde">Crear propiedad</a>

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
            <?php foreach ($propiedades as $propiedad) { ?>
                <tr>
                    <td><?= $propiedad->id ?></td>
                    <td><?= $propiedad->titulo ?></td>
                    <td><img src="<?php echo URL_IMAGENES .  $propiedad->imagen ?>" class="imagen-tabla"></td>
                    <td>$<?= $propiedad->precio ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $propiedad->id ?>">
                            <button class="boton-rojo-block w-100 m-0" type="submit">Eliminar</button>
                        </form>
                        <a href="<?php echo URL_PROPIEDADES . "actualizar.php?id={$propiedad->id}" ?>" class="boton-amarillo-block m-0">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>
<?php
incluirTemplates("footer");
?>