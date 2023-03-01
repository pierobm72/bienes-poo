<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

estaAutenticado();


//Validar que el id sea entero
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$id) header("Location: " . URL_ADMIN);


//Obtener los datos de la propiedad con el id
$propiedad = Propiedad::find($id);

// Consultar para obtener los vendedores de la base de ddaots
$vendedores = Vendedor::all();


//Arreglo que contiene los errroes;
$errores = Propiedad::getErrores();



//Verificar que la peticion de datos sea de tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Asignar los atributos 
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    $errores = $propiedad->validar();


    //Verificar que los campos de el formulario este lleno
    if (empty($errores)) {

        //Verificar que se hay subido una imagen
        if ($_FILES['propiedad']['tmp_name']['imagen']) {

            //Obtener extension de la imagen
            $extensionImagen =  strrchr($_FILES['propiedad']['name']['imagen'], '.');
            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . $extensionImagen;

            //Almacenar la imagen temporal en una variable usando Intervetion Image
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']);
            // Redimensionar proporcionalmente
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            //Setear la imagen
            $propiedad->setImagen($nombreImagen);

            $image->save(RUTA_IMAGENES . $nombreImagen);
        }

        $propiedad->guardar();
    }
}

incluirTemplates("header");
?>

<main class="contenedor seccion">
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error"><?= $error ?></div>
    <?php } ?>

    <h1>Actualizar Propiedad</h1>
    <a href="<?= URL_ADMIN ?>" class="boton boton-verde">Volver</a>

    <form class="formulario" enctype="multipart/form-data" method="POST">
        <?php include RUTA_TEMPLATES . "formulario_propiedades.php" ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplates("footer");
?>