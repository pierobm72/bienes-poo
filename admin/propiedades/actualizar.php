<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
require RUTA_BASEDATOS;

//Validar que el id sea entero
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if(!$id) header("Location: " . URL_ADMIN);

//Conectarse a la base de datos
$db = conectarDB();

//Obtener los datos de la propiedad con el id
$consulta = "SELECT * FROM propiedades WHERE id=$id";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

// Consultar para obtener los vendedores de la base de ddaots
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//Arreglo que contiene los errroes;
$errores = [];

// Inicializar las variables con los resultados de la base de datos
$titulo = $propiedad["titulo"];
$precio = $propiedad["precio"];
$descripcion = $propiedad["descripcion"];
$habitacion = $propiedad["habitacion"];
$wc = $propiedad["wc"];
$estacionamiento = $propiedad["estacionamiento"];
$vendedor_id = $propiedad["vendedor_id"];
$imagenPropiedad = $propiedad["imagen"];

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
    $imagen = $_FILES["imagen"];


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

    $medida = 1000 * 100;
    if ($imagen["size"] > $medida) {
        $errores[] = "La imagen es muy grande";
    }

    //Verificar que los campos de el formulario este lleno
    if (empty($errores)) {

        // // --- SUBIDA DE ARCHIVOS ---

        // //Ruta de la carpeta imagenes
        // $carpetaImagenes = RUTA_IMAGENES;
        // //Verifica que la carpeta imagenes no exista
        // if (is_dir($carpetaImagenes) === false) {
        //     //Crear la carpeta imagenes
        //     mkdir($carpetaImagenes);
        // }

        // //Obtener extension de la imagen
        // $extensionImagen =  strrchr($_FILES['imagen']['name'], '.');
        // //Generar nombre unico
        // $nombreImagen = md5(uniqid(rand(), true)) . $extensionImagen;

        // //Subir la imagen
        // move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


        //Query para actualizar los datos
        $query = "UPDATE propiedades SET ";
        $query .="titulo = '{$titulo}',";
        $query .="precio = {$precio},";
        $query .="descripcion = '{$descripcion}',";
        $query .="habitacion = {$habitacion},";
        $query .="wc = {$wc},";
        $query .="estacionamiento = {$estacionamiento},";
        $query .="vendedor_id = '{$vendedor_id}' ";
        $query .="WHERE id= $id;";


        //Insertar la consulta a la base de datos
        $resultado = mysqli_query($db, $query);

        //Validar que la consulta se ha enviado
        if ($resultado) {
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
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo" value="<?= $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio" name="precio" value="<?= $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            <img src="<?php echo URL_IMAGENES .  $imagenPropiedad?>" class="imagen-actualizar">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?= $descripcion ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitacion">Habitaciones:</label>
            <input type="number" min="1" max="9" id="habitacion" placeholder="Ejm. 3" name="habitacion" value="<?= $habitacion ?>">

            <label for="wc:">Baños:</label>
            <input type="number" min="1" max="9" id="wc:" placeholder="Ejm. 3" name="wc" value="<?= $wc ?>">

            <label for="estacionamiento:">Estacionamiento:</label>
            <input type="number" min="1" max="9" id="estacionamiento:" placeholder="Ejm. 3" name="estacionamiento" value="<?= $estacionamiento ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor_id">
                <option value="">--Elige el vendedor --</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <option <?php echo $vendedor_id === $row["id"] ? "selected" : "" ?> value="<?= $row["id"] ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php } ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplates("footer");
?>