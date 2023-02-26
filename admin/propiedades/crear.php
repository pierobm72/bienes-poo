<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

//Conectarse a la base de datos
$db = conectarDB();

// Consultar para obtener los vendedores de la base de ddaots
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//Arreglo que contiene los errroes;
$errores = Propiedad::getErrores();

// Inicializar las variables en blanco
$titulo = "";
$precio = "";
$descripcion = "";
$habitacion = "";
$wc = "";
$estacionamiento = "";
$vendedor_id = "";

//Verificar que la peticion de datos sea de tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Crear una nueva instancia
  $propiedad = new Propiedad($_POST);


  //Verificar que se hay subido una imagen
  if ($_FILES['imagen']['tmp_name']) {

    //Obtener extension de la imagen
    $extensionImagen =  strrchr($_FILES['imagen']['name'], '.');
    //Generar nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . $extensionImagen;

    //Almacenar la imagen temporal en una variable usando Intervetion Image
    $image = Image::make($_FILES['imagen']['tmp_name']);
    // Redimensionar proporcionalmente
    $image->resize(800, null, function ($constraint) {
      $constraint->aspectRatio();
    });

    //Setear la imagen
    $propiedad->setImagen($nombreImagen);
  }

  $errores = $propiedad->validar();

  //Verificar que los campos de el formulario este lleno
  if (empty($errores)) {

    // --- SUBIDA DE ARCHIVOS ---    

    //Verifica que la carpeta imagenes no exista
    if (is_dir(RUTA_IMAGENES) === false) {
      //Crear la carpeta imagenes
      mkdir(RUTA_IMAGENES);
    }

    //Guardar la imagen en la carpeta imagenes del servidor
    $image->save(RUTA_IMAGENES . $nombreImagen);

    //Insertar los registros en la base de datos
    $resultado = $propiedad->guardar();

    //Validar que la consulta se ha enviado
    if ($resultado) {
      header("Location: /admin?resultado=1");
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

  <h1>Crear</h1>
  <a href="<?= URL_ADMIN ?>" class="boton boton-verde">Volver</a>

  <form class="formulario" action="<?= URL_PROPIEDADES ?>/crear.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo" value="<?= $titulo ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Precio" name="precio" value="<?= $precio ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

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

    <input type="submit" value="Crear" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplates("footer");
?>