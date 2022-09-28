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
    <title>Compra</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="apis/api-carrito/js/carrito.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="site-header secciones">
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
                    <a href="categorias.php">Categorias</a>
                    <a href="productos.php">Productos</a>
                    <a href="#">Contacto</a>
                    <a href="ingreso-usuario/ver-perfil.php">Ver Perfil</a>
                    <a href="ingreso-usuario/logout.php"><img src="img/salida.svg" alt=""></a>
                </nav>
            </div>
        </div>
    </header>

    <main class="registro seccion">
        <h1 class="centrar-texto fw-300">Realiza Tu Compra</h1>
        <p class="nombre-user" hidden><?php echo $_SESSION['nid']?></p>
        <form action="" class="form-registro seccion contenedor">
            <div class="field">

                <fieldset>
                    <legend class="fw-300 centrar-texto">Datos Del Usuario</legend>

                    <label for="nid">N° Identificacion</label>
                    <input type="number" name="nid" id="nid" placeholder="N° de Identificacion" required autocomplete="off">

                    <label for="idProducto">ID Producto</label>
                    <input type="number" name="idProducto" id="idProducto" required autocomplete="off">
                </fieldset>

                <fieldset class="contacto">
                    <legend class="fw-300 centrar-texto">Datos de Porducto</legend>

                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio">

                    <label for="cantidadProducto">Cantidad del Producto</label>
                    <input type="number" name="cantidadProducto" id="cantidadProducto">

                    <label for="estadoCompra">Estado de la Compra</label>
                    <input type="number" name="estadoCompra" id="estadoCompra">
                </fieldset>
            </div>

            <div class="btn-registro">
                <input type="submit" value="Registrarse" class="boton boton-verde">
            </div>
        </form>
    </main>

    <footer class="site-footer seccion site-header secciones">
        <!-- Footer -->
        <div class="contenedor-footer">
            <!-- Contenido Footer-->
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer> <!-- Footer -->

</body>

</html>