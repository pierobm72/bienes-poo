<?php 
    include("./includes/templates/header.php");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <picture>
                <source srcset="build/img/destacada.webp" type="image/webp">
                <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
            </picture>
        </picture>

        <div class="resumen-propiedad">
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

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quisquam repellat architecto officia porro ad, facere temporibus quas quaerat ea fugit soluta, quos dolorem praesentium. Expedita id ea corporis tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, sed, quidem animi dolor blanditiis ducimus nostrum similique cumque fugiat expedita eveniet veritatis aliquam. Libero voluptatibus non fugiat voluptatem fuga quos!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, saepe ipsum ad quia ipsa ut sed nam nemo perspiciatis eligendi vel provident aspernatur, magnam accusamus, dolorem obcaecati error minus iusto.</p>
        </div>
    </main>

    <?php
incluirTemplates("footer");
?>