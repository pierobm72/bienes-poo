<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/rutas.php";
include_once RUTA_FUNCIONES;
incluirTemplates("header",true);
?>

<main class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi?
                Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi?
                Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p> Fugiat ad velit, tenetur ducimus quaerat voluptatibus, dignissimos expedita iusto quia, ea nisi?
                Impedit voluptates vero eius esse rerum minima, iure necessitatibus.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>
    <div class="contenedor-anuncios">
        <div class="anuncio">
            <picture>
                <source srcset="./build/img/anuncio1.webp" type="image/webp">
                <source srcset="./build/img/anuncio1.jpg" type="image/jpg">
                <img src=".build/img/anuncio1.jpg" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa de Lujo en el Lago</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                <p class="precio">$ 3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg " alt="icono habitaciones" loading="lazy">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.html" class="boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido anuncio -->

        </div> <!-- anuncio -->
        <div class="anuncio">
            <picture>
                <source srcset="./build/img/anuncio2.webp" type="image/webp">
                <source srcset="./build/img/anuncio2.jpg" type="image/jpg">
                <img src=".build/img/anuncio2.jpg" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa de terminadas de lujo</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                <p class="precio">$ 3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg " alt="icono habitaciones" loading="lazy">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.html" class="boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido anuncio -->

        </div> <!-- anuncio -->
        <div class="anuncio">
            <picture>
                <source srcset="./build/img/anuncio3.webp" type="image/webp">
                <source srcset="./build/img/anuncio3.jpg" type="image/jpg">
                <img src=".build/img/anuncio3.jpg" alt="Anuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa con alberca</h3>
                <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                <p class="precio">$ 3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p>3</p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg " alt="icono habitaciones" loading="lazy">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.html" class="boton-amarillo-block">Ver propiedad</a>
            </div> <!-- contenido anuncio -->

        </div> <!-- anuncio -->
    </div> <!-- contenedor anuncios -->

    <div class="ver-todas alinear-derecha">
        <a href="anuncios.html" class="boton boton-verde">Ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.html" class="boton-amarillo-block">Contactanos</a>
</section>

<div class="contenedor seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
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
    </section>

    <secction class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                Excelente precios de las casas, solo calidad
            </blockquote>
            <p>Piero</p>
        </div>
    </secction>
</div>

<?php
include "./includes/templates/footer.php";
?>