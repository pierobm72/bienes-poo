<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

use App\Vendedor;
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();


$propiedad = new Propiedad();

// Consultar para obtener los vendedores de la base de ddaots
$vendedores = Vendedor::all();

//Arreglo que contiene los errroes;
$errores = Propiedad::getErrores();


//Verificar que la peticion de datos sea de tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //Crear una nueva instancia
  $propiedad = new Propiedad($_POST['propiedad']);

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

     //Mensaje de exito
     if ($resultado) {
      //Mandar al index con mensaje
      header("location:/admin?resultado=1");
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

  <form class="formulario" action="<?php echo URL_PROPIEDADES . "crear.php"?>" method="POST" enctype="multipart/form-data">
    <?php include RUTA_TEMPLATES . "formulario_propiedades.php"?>
    <input type="submit" value="Crear" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplates("footer");
?>