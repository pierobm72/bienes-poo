<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
include_once RUTA_BASEDATOS;
incluirTemplates('header');

//Base de datos
$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $email  = mysqli_real_escape_string($db,filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST["password"]);
  $passwordHash = password_hash($password, PASSWORD_BCRYPT);

  if (!$email) {
    $errores[] = "El email es obligatorio o no es invalido";
  }

  if (!$password) {
    $errores[] = "El password es obligatorio";
  }

  //Si no hay error
  if (empty($errores)) {

    //Comprobar que el usuario existe
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db, $query);

    //Verificar si el usuario existe en la base de datos
    if ($resultado->num_rows) {

      $usuario = mysqli_fetch_assoc($resultado);

      //Verificar que el password ingresado y el hash de la base de datos sean iguales
      $auth = password_verify($password, $usuario["password"]);


      if ($auth) {
        //Usuario autenticado
        session_start();

        //Llenar arreglo de sesion
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["login"] = true;
        header('location: ' . URL_ADMIN);
      } else {
        $errores[] = "Password incorrecto";
      }
    } else {
      $errores[] = "Usuario no existe";
    }
  }
}



?>
<main class="contenedor seccion ">
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?= $error ?>
    </div>
  <?php endforeach ?>
  <h1>Iniciar Sesion</h1>
  <form class="formulario contenido-centrado mx-auto" method="post">
    <fieldset>
      <legend>Cuenta</legend>

      <label for="email">Tu email: </label>
      <input type="text" id="email" name="email" placeholder="Tu email">

      <label for="password">Tu password: </label>
      <input type="password" id="password" name="password" placeholder="Tu password">

    </fieldset>

    <input type="submit" value="Iniciar sesion" class="boton-verde">
  </form>


</main>
<?php
incluirTemplates("footer");
?>