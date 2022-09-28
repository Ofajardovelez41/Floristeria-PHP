<?php
session_start();

if(!empty($_SESSION['user'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/ingreso.js"></script>
</head>
<body>
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
                    <a href="#">Categorias</a>
                    <a href="#">Ofertas</a>
                    <a href="#">Contacto</a>
                    <a href="../index.html">Inicio</a>
                    <a href="registro.php">Registrate</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="login">
        <h1 class="centrar-texto fw-300">Login</h1>
        <form action="" class="form-login">
            
                <input type="text" name="user" id="user" placeholder="Usuario" required autocomplete="off">

                <input type="password" name="pass" id="pass" placeholder="Contraseña" required autocomplete="off">

           
            <div class="btn-login">
                <input type="submit" value="Iniciar Sesion" class="boton boton-amarillo">
            </div>
        </form>

    </main>
    <footer class="site-footer site-header secciones">
        <!-- Footer -->
        <div class="contenedor-footer">
            <!-- Contenido Footer-->
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer> <!-- Footer -->

</body>
</html>