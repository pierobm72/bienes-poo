<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
incluirTemplates("header");
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog1.webp" type="image/webp">
                <source srcset="build/img/blog1.jpg" type="image/jpg">
                <img src="build/img/blog1.jpg" alt="Entrada blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.html">
                <h4>Terraza en el techo de tu casa</h4>
                <p>Escrito el: <span>20/20/2022</span>por <span>admin</span></p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog2.webp" type="image/webp">
                <source srcset="build/img/blog2.jpg" type="image/jpg">
                <img src="build/img/blog2.jpg" alt="Entrada blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.html">
                <h4>Guia para direccion de tu hogar</h4>
                <p>Escrito el: <span> 20/20/2022</span>por <span>admin</span></p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog3.webp" type="image/webp">
                <source srcset="build/img/blog3.jpg" type="image/jpg">
                <img src="build/img/blog2.jpg" alt="Entrada blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.html">
                <h4>Guia para direccion de tu hogar</h4>
                <p>Escrito el: <span> 20/20/2022</span>por <span>admin</span></p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog4.webp" type="image/webp">
                <source srcset="build/img/blog4.jpg" type="image/jpg">
                <img src="build/img/blog2.jpg" alt="Entrada blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.html">
                <h4>Guia para direccion de tu hogar</h4>
                <p>Escrito el: <span> 20/20/2022</span>por <span>admin</span></p>
            </a>
        </div>
    </article>
</main>

<?php
incluirTemplates("footer");
?>