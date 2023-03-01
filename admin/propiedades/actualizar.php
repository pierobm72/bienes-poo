<?php

use App\Propiedad;

include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

estaAutenticado();


//Validar que el id sea entero
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$id) header("Location: " . URL_ADMIN);


//Obtener los datos de la propiedad con el id
$propiedad = Propiedad::find($id);

// Consultar para obtener los vendedores de la base de ddaots
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//Arreglo que contiene los errroes;
$errores = Propiedad::getErrores();



//Verificar que la peticion de datos sea de tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    //Almacenar los datos ingresados por el usuario en el formulario
    //Sanitizar los datos
    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitacion = mysqli_real_escape_string($db, $_POST["habitacion"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
    $vendedor_id = mysqli_real_escape_string($db, $_POST["vendedor_id"]);
    $creado = date("Y/m/d");
    $imagen = $_FILES["imagen"]; //Imagen que sube el usuario


    if ($titulo === "") {
        $errores[] = "El titulo es obligatorio";
    }

    if ($precio === "") {
        $errores[] = "El precio es obligatorio";
    }

    if (strlen($descripcion) < 1) {
        $errores[] = "La descripcion es obligatoria y debe ser mayor a 50 caracteres";
    }

    if ($habitacion === "") {
        $errores[] = "La habitacion es obligatoria";
    }

    if ($wc === "") {
        $errores[] = "El baño es obligatoria";
    }

    if ($estacionamiento === "") {
        $errores[] = "El numero de lugares de estacionamiento es obligatoria";
    }

    if ($vendedor_id === "") {
        $errores[] = "Elige un vendedor";
    }

    $medida = 3000 * 100;
    if ($imagen["size"] > $medida) {
        $errores[] = "La imagen es muy grande";
    }

    //Verificar que los campos de el formulario este lleno
    if (empty($errores)) {

        // --- SUBIDA DE ARCHIVOS ---

        //Ruta de la carpeta imagenes
        $carpetaImagenes = RUTA_IMAGENES;
        //Verifica que la carpeta imagenes no exista
        if (is_dir($carpetaImagenes) === false) {
            //Crear la carpeta imagenes
            mkdir($carpetaImagenes);
        }

        $nombreImagen = "";

        //Verificar si se ha subido una nuevo imagen
        if ($imagen["name"]) {
            //Eliminar imagen previa
            unlink($carpetaImagenes . $propiedad["imagen"]);

            //Obtener extension de la imagen
            $extensionImagen =  strrchr($_FILES['imagen']['name'], '.');
            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . $extensionImagen;

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad["imagen"];
        }




        //Query para actualizar los datos
        $query = "UPDATE propiedades SET ";
        $query .= "titulo = '{$titulo}',";
        $query .= "precio = {$precio},";
        $query .= "descripcion = '{$descripcion}',";
        $query .= "imagen = '{$nombreImagen}',";
        $query .= "habitacion = {$habitacion},";
        $query .= "wc = {$wc},";
        $query .= "estacionamiento = {$estacionamiento},";
        $query .= "vendedor_id = '{$vendedor_id}' ";
        $query .= "WHERE id= $id;";


        //Insertar la consulta a la base de datos
        $resultado = mysqli_query($db, $query);

        //Validar que la consulta se ha enviado
        if ($resultado) {
            //Redireccionar al usuario
            header("Location: /admin?resultado=2");
        } else {
            echo "Fallo al insertar en la base de datos";
            echo $resultado;
        }
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