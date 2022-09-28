<?php
    session_start();
    
    if(empty($_SESSION['nid'])){
        header('Location: ingreso-usuario/login.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowershop.com</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="ingreso-usuario/js/ingreso.js"></script>
    <script src="apis/api-categorias/js/categorias.js"></script>

</head>

<body>


    <!-- Header -->
    <header class="site-header inicio">
        <!-- Contenido -->
        <div class="contenedor contenido-header">
            <!-- Barra -->
            <div class="barra">
                <!-- Imagen del Logo -->
                <a href="index.php">
                    <h1>
                    Flower<span>Shop<span></h1>
                </a>

                <!-- Barra de Navegacion -->
                <nav class="navegacion">
                    <a href="#">Categorias</a>
                    <a href="#">Ofertas</a>
                    <a href="#">Contacto</a>
                    <a href="ingreso-usuario/ver-perfil.php">Ver Perfil</a>
                    <a href="ingreso-usuario/logout.php"><img src="img/salida.svg" alt=""></a>
                </nav>
            </div>
            <h2>¡¡Hermosas Plantas para adnornar tu casa, tu jardin y para esos detalles que alegran el día!!</h2>
        </div>
    </header>

    <div class="carrito contenedor">
        <a href="carrito.php" class="boton boton-verde"><img src="img/carrito.svg" alt="Carro de Compra"></a>
    </div>
    
    <section class="contenedor seccion">
        <h1 class="fw-300 centrar-texto">Sobre Nosotros</h1>
        <div class="contenedor-nosotros seccion">
            <div class="card">
                <h2>Seguridad</h2>
                <img src="img/candado.svg" alt="Seguridad">
                <p>Brindamos la mejor seguridad para tus datos y tu informacion, con el mejor respaldo y confianza, puedes confiarnos tus deseos</p>
            </div>
            <div class="card">
                <h2>Quienes Somos</h2>
                <img src="img/recomendar.svg" alt="Quienes Somos">
                <p>Somos una microempresa con varios años en el mercado floral, orgullosos de tener gran acopio de compradores y visitantes</p>
            </div>
            <div class="card">
                <h2>Confianza</h2>
                <img src="img/reliability.svg" alt="Confianza">
                <p>Tenemos la gran capacidad de realizar envios seguros y rapidos, para que tengas la mejor confianza de realizar nuestras compras</p>
            </div>
        </div>
    </section>
    
    <section class="imagen-anuncio">
        <div class="contenedor contenido-anuncio">
            <div class="text-anuncio">
                <h2>Compra la flor o planta de tus Sueños</h2>
                <p class="fw-300">Mira entre la variedad de productos que tenemos para ofrecerte, plantas para tu jardin y flores para esos hermosos detalles</p>
            </div>
            <a href="productos.php" class="boton boton-amarillo">Ver Productos</a>
        </div>
    </section>

    <main class="contenedor seccion">
        <h1 class="fw-300 centrar-texto">Categoria</h1>

        <div class="contenedor-categorias seccion categorias-index">
        </div>

        <div class="ver-todas">
            <a href="categorias.php" class="boton boton-verde">Ver Todas</a>
        </div>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer>
    
</body>

</html>