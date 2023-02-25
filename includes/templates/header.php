<?php 
    if(!isset($_SESSION)){
        session_start();        
    }

    $auth = $_SESSION["login"] ?? false;
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css">

</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="navegacion">
                    <a href="<?php echo URL_BASE . "/nosotros.php"?>">Nosotros</a>
                    <a href="<?php echo URL_BASE . "/anuncios.php"?>">Anuncios</a>
                    <a href="<?php echo URL_BASE . "/blog.php"?>">Blog</a>
                    <a href="<?php echo URL_BASE . "/contacto.php"?>">Contacto</a>
                    <?php if($auth) { ?>                        
                    <a href="<?php echo URL_ADMIN . "/index.php"?>" class="boton-sesion iniciar">Admin</a>
                    <a href="<?php echo URL_BASE . "/cerrar-sesion.php"?>" class="boton-sesion cerrar">Cerrar sesion</a>
                    <?php } ?>
                    <?php if(!$auth) { ?>                        
                    <a href="<?php echo URL_BASE . "/login.php"?>" class="boton-sesion iniciar">Iniciar sesion</a>
                    <?php } ?>
                </div>

            </div> <!-- Barra -->

            <?php if($inicio) {
                echo "<h1>Venta de cajas y Departamentos exclusivos de lujo</h1>";
                }
            ?>
        </div>
    </header>