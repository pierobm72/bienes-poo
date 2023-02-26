<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_APP;
incluirTemplates("header");
?>


<main class="contenedor seccion">
    <h1>Conoce sobre nosotros</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <img src="build/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>
                25 años de experiencia
            </blockquote>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat nesciunt molestias, vitae, perferendis tempora dignissimos voluptas omnis, odio reprehenderit dolorum asperiores. Expedita sit aliquid quo voluptas dolorum id quam modi.</p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse rerum numquam at beatae soluta excepturi nisi cum iusto temporibus, blanditiis sequi obcaecati tempora suscipit, adipisci eaque ducimus laborum sapiente omnis.
            </p>
        </div>
    </div>
</main>

<section class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi? Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi? Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi? Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
    </div>
</section>

<?php
incluirTemplates("footer");
?>