<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

//Implementar metodo para obtener todas las propiedades
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

//Mostrar mensaje condicional
$mensaje = $_GET["resultado"] ?? false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

    if ($id) {

        $tipo = $_POST["tipo"];

        if (validarTipo($tipo)) {
            if ($tipo === "propiedad") {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            } else if ($tipo === "vendedor") {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }
    }
}

incluirTemplates("header");
?>
<main class="contenedor seccion">
    <?php
    $notificacion = mostrarNotificacion(intval($mensaje));
    if ($notificacion) : ?>
        <p class="alerta exito"> <?php echo s($notificacion) ?></p>
    <?php endif ?>
    <h1>Administrador de bienes raices</h1>

    <a href="<?= URL_PROPIEDADES ?>crear.php" class="boton boton-verde">Crear propiedad</a>
    <a href="<?= URL_VENDEDORES ?>crear.php" class="boton boton-verde">Nuevo Vendedor</a>

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
                            <input type="hidden" name="tipo" value="propiedad">
                            <button class="boton-rojo-block w-100 m-0" type="submit">Eliminar</button>
                        </form>
                        <a href="<?php echo URL_PROPIEDADES . "actualizar.php?id={$propiedad->id}" ?>" class="boton-amarillo-block m-0">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </thead>
        <!-- Mostrar los resultados con php -->
        <tbody>
            <?php foreach ($vendedores as $vendedor) { ?>
                <tr>
                    <td><?= $vendedor->id ?></td>
                    <td><?= $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td><?= $vendedor->telefono ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <button class="boton-rojo-block w-100 m-0" type="submit">Eliminar</button>
                        </form>
                        <a href="<?php echo URL_VENDEDORES . "actualizar.php?id={$vendedor->id}" ?>" class="boton-amarillo-block m-0">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>
<?php
incluirTemplates("footer");
?>