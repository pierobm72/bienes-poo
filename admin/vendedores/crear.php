<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;

use App\Vendedor;

estaAutenticado();


$vendedor = new Vendedor();

//Arreglo que contiene los errroes;
$errores = Vendedor::getErrores();


//Verificar que la peticion de datos sea de tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Crear una nueva instancia
  $vendedor = new Vendedor($_POST['vendedor']);

  $errores = $vendedor->validar();

  //Verificar que los campos de el formulario este lleno
  if (empty($errores)) {

    //Insertar los registros en la base de datos
    $vendedor->guardar();

    
  }
}

incluirTemplates("header");
?>

<main class="contenedor seccion">
  <?php foreach ($errores as $error) { ?>
    <div class="alerta error"><?= $error ?></div>
  <?php } ?>

  <h1>Registrar vendedor</h1>
  <a href="<?= URL_ADMIN ?>" class="boton boton-verde">Volver</a>

  <form class="formulario" action="<?php echo URL_VENDEDORES. "crear.php" ?>" method="POST" enctype="multipart/form-data">
    <?php include RUTA_TEMPLATES . "formulario_vendedores.php" ?>
    <input type="submit" value="Crear" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplates("footer");
?>