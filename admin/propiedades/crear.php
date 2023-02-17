<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
incluirTemplates("header");
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/" class="boton boton-verde">Volver</a>

    <form class="formulario">
      <fieldset>
          <legend>Informacion General</legend>

          <label for="titulo">Titulo:</label>
          <input type="text" id="titulo" placeholder="Titulo Propiedad">

          <label for="precio">Precio:</label>
          <input type="text" id="precio" placeholder="Titulo Precio">

          <label for="imagen">Imagen:</label>
          <input type="file" id="imagen"  accept="image/jpeg, image/png">

          <label for="descripcion">Descripcion:</label>
          <textarea id="descripcion" ></textarea>

      </fieldset>

      <fieldset>
          <legend>Informacion Propiedad</legend>

          <label for="habitaciones">Habitaciones:</label>
          <input type="number" min="1" max="9" id="habitaciones" placeholder="Ejm. 3">

          <label for="wc:">Baños:</label>
          <input type="number" min="1" max="9" id="wc:" placeholder="Ejm. 3">

          <label for="estacionamiento:">Estacionamiento:</label>
          <input type="number" min="1" max="9" id="estacionamiento:" placeholder="Ejm. 3">          

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select>
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