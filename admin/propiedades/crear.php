<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
require RUTA_BASEDATOS;

//Conectarse a la base de datos
$db = conectarDB();

//Verificar que la peticion de datos sea de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Almacenar los datos ingresados por el usuario en el formulario
  $titulo = $_POST["titulo"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $habitacion = $_POST["habitacion"];
  $wc = $_POST["wc"];
  $estacionamiento = $_POST["estacionamiento"];
  $vendedor_id = $_POST["vendedor_id"];

  //Almacenar los datos en una query
  $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitacion,wc,estacionamiento,vendedor_id) ";
  $query .= "VALUES ('$titulo','$precio','$descripcion','$habitacion','$wc','$estacionamiento','$vendedor_id');";

  //Insertar la consulta a la base de datos
  $resultado = mysqli_query($db,$query);

  //Validar que la consulta se ha enviado
  if($resultado){
    echo "Insertado correctamente";
  }
}

incluirTemplates("header");
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/" class="boton boton-verde">Volver</a>

    <form class="formulario" action="/admin/propiedades/crear.php" method="POST">
      <fieldset>
          <legend>Informacion General</legend>

          <label for="titulo">Titulo:</label>
          <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo">

          <label for="precio">Precio:</label>
          <input type="number" id="precio" placeholder="Titulo Precio" name="precio">

          <label for="imagen">Imagen:</label>
          <input type="file" id="imagen"  accept="image/jpeg, image/png">

          <label for="descripcion">Descripcion:</label>
          <textarea id="descripcion" name="descripcion"></textarea>

      </fieldset>

      <fieldset>
          <legend>Informacion Propiedad</legend>

          <label for="habitacion">Habitaciones:</label>
          <input type="number" min="1" max="9" id="habitacion" placeholder="Ejm. 3" name="habitacion">

          <label for="wc:">Baños:</label>
          <input type="number" min="1" max="9" id="wc:" placeholder="Ejm. 3" name="wc">

          <label for="estacionamiento:">Estacionamiento:</label>
          <input type="number" min="1" max="9" id="estacionamiento:" placeholder="Ejm. 3" name="estacionamiento">          

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedor_id">
            <option value="1">Juan</option>
            <option value="2">Karen</option>
        </select>
      </fieldset>

      <input type="submit" value="Enviar" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplates("footer");
?>