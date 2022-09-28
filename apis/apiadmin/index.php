<?php
session_start();

if(!empty($_SESSION['user_Admin'])){
    header('Location: home.php');
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador Global</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/flower-shop/css/styles.css">
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/admin.js"></script>
</head>

<body>
    <header class="site-header">
        <!-- Contenido -->
                <a href="index.php" class="barra">
                    <h1>
                        Flower<span>Shop<span></h1>
                </a>

                <!-- Barra de Navegacion -->
                <h2>Administrador Global</h2>
    </header>
    <main class="login">
        <div class="form contenedor">
            <form action="" id="form-admin">
                <div class="datos">
                    <input type="text" name="user" id="user" placeholder="User" required autocomplete="off">
                    
                    <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off">
                </div>
    
                <input type="submit" value="Entrar" class="boton boton-negro">
            </form>
        </div>
    </main>

    <footer class="site-footer ">
        <div class="contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer>
        
</body>

</html>