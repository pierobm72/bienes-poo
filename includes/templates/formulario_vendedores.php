<fieldset>
  <legend>Informacion General</legend>

  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" placeholder="Nombre vendedor: " name="vendedor[nombre]" value="<?= s($vendedor->nombre) ?>">

  

  <label for="apellido">apellido:</label>
  <input type="text" id="apellido" placeholder="apellido vendedor: " name="vendedor[apellido]" value="<?= s($vendedor->apellido) ?>">  

</fieldset>

<fieldset>
  <legend>Informacion extra</legend>

  <label for="telefono">telefono:</label>
  <input type="tel" id="telefono" placeholder="telefono vendedor: " name="vendedor[telefono]" value="<?= s($vendedor->telefono) ?>">

</fieldset>