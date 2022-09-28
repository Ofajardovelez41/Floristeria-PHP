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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="ingreso-usuario/js/ingreso.js"></script>
    <link rel="stylesheet" href="ingreso-usuario/css/ingreso.css">
    <script src="apis/api-plantas/js/productos.js"></script>
    <script src="apis/api-carrito/js/carrito.js"></script>
</head>

<body>

    <!-- <input type="text" name="user" id="user" value=""> -->

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
    
    <div class="carrito contenedor">
        <a href="#" class="boton boton-verde"><img src="img/carrito.svg" alt="Carro de Compra"></a>
    </div>
    
    <main class="main contenedor seccion">
        <h1 class="fw-300 centrar-texto tituloP">Productos</h1>
        <p class="nombre-user" hidden><?php echo $_SESSION['nid']?></p>

        <div class="contenedor-productos seccion">
        </div>

        <a href="#" class="boton boton-rojo borrar-todo">Borra Todo</a>
    </main>

    <main class="compra registro seccion">
        <h1 class="centrar-texto fw-300">Realiza Tu Compra</h1>
        <p class="nombre-user" hidden><?php echo $_SESSION['nid']?></p>
        <form action="" class="form-compra seccion contenedor">
            <div class="field">

                <fieldset>
                    <legend class="fw-300 centrar-texto">Producto</legend>

                    <label for="nid">N° Identificacion</label>
                    <input type="number" name="nid" id="nid" placeholder="N° de Identificacion" required autocomplete="off">

                    <label for="idProducto">ID Producto</label>
                    <input type="number" name="idProducto" id="idProducto">

                    <label for="estadoCompra">Estado de la Compra</label>
                    <input type="text" name="estadoCompra" id="estadoCompra">
                </fieldset>

                <fieldset class="contacto">
                    <legend class="fw-300 centrar-texto">Información</legend>

                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio">

                    <label for="cantidadProducto">Cantidad del Producto</label>
                    <input type="number" name="cantidadProducto" id="cantidadProducto">

                    <label for="total">Total</label>
                    <input type="number" name="total" id="total">

                    <label for="tipo-id">Direccion</label>
                    <select name="direccion" id="direccion">
                        <option value="" disabled selected>-- Seleccione --</option>
                    </select>
                </fieldset>
            </div>

            <div class="btn-registro">
                <input type="submit" value="Comprar" class="boton boton-verde">
            </div>
        </form>
    </main>



    <footer class="site-footer seccion site-header secciones">
        <div class="contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer>
</body>

</html>
