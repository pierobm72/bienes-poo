<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
incluirTemplates("header");
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <img loading="lazy"  src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion Personal </legend>
                <label for="nombre">Nombre: </label>
                <input type="text" placeholder="Tu nombre:" id="nombre">

                <label for="email">Email: </label>
                <input type="email" placeholder="Tu email:" id="email">

                <label for="telefono">Telefono: </label>
                <input type="tel" placeholder="Tu telefono:" id="telefono">

                <label for="mensaje">Mensaje: </label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>
                
                <label for="opciones">Vende o compra: </label>
                <select name="" id="opciones">
                    <option disabled selected>- Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="precio">Precio: </label>
                <input type="number" placeholder="Tu precio:" id="precio">
            </fieldset>
            <fieldset>
                <legend>Informacion Personal </legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono: </label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">Email: </label>
                    <input name="contacto" type="radio" value="email" id="contactar-telefono">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>
                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha">
    
                    <label for="hora">Hora:</label>
                    <input type="time" id="hora" min="09:00" max="18:00">
                </div>
            </fieldset>
            <button type="submit" value="enviar" class="boton-verde">Enviar</button>
        </form>
    </main>
    
<?php
incluirTemplates("footer");
?>