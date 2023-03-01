<fieldset>
      <legend>Informacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" placeholder="Titulo Propiedad" name="propiedad[titulo]" value="<?= s($propiedad->titulo) ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" placeholder="Precio" name="propiedad[precio]" value="<?= s($propiedad->precio) ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

      <?php if($propiedad->imagen) { ?>
        <img src="<?= URL_IMAGENES . $propiedad->imagen ?>" class="imagen-small" alt="">
      <?php } ?>

      <label for="descripcion">Descripcion:</label>
      <textarea id="descripcion" name="propiedad[descripcion]"><?= s($propiedad->descripcion) ?></textarea>

    </fieldset>

    <fieldset>
      <legend>Informacion Propiedad</legend>

      <label for="habitacion">Habitaciones:</label>
      <input type="number" min="1" max="9" id="habitacion" placeholder="Ejm. 3" name="propiedad[habitacion]" value="<?= s($propiedad->habitacion) ?>">

      <label for="wc:">Baños:</label>
      <input type="number" min="1" max="9" id="wc:" placeholder="Ejm. 3" name="propiedad[wc]" value="<?= s($propiedad->wc) ?>">

      <label for="estacionamiento:">Estacionamiento:</label>
      <input type="number" min="1" max="9" id="estacionamiento:" placeholder="Ejm. 3" name="propiedad[estacionamiento]" value="<?= s($propiedad->estacionamiento) ?>">

    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>
      <select name="propiedad[vendedor_id]">
        <option value="">--Elige el vendedor --</option>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
          <option <?php echo $propiedad->vendedor_id === $row["id"] ? "selected" : "" ?> value="<?= $row["id"] ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
        <?php } ?>
      </select>
    </fieldset>