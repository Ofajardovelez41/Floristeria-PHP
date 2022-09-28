<?php
session_start();
if(empty($_SESSION['user_Admin'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
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
    <!-- Header -->
    <header class="site-header">
        <!-- Contenido -->
        <a href="index.php" class="barra">
            <h1>
                Flower<span>Shop<span></h1>
        </a>

        <!-- Barra de Navegacion -->
        <div class="mensaje-saludo">
            <p>Bienvenido <?php echo $_SESSION['user_Admin']?>!!</p>
            <a class="logout boton boton-rojo boton-salir" href="logout.php">Salir</a>
        </div>
    </header>
    <!-- Tablas para Administrar -->
    <main class="main">
        <div class="tablas">
            <div class="card-tabla">
                <div class="texto">
                    <a href="../api-usuarios/index.php" class="fw-300 centrar-texto">Usuarios</a>
                </div>
                <div class="icon">
                    <img src="img/ajustes.svg" alt="Administrar Usuarios">
                </div>
            </div>
            <div class="card-tabla">
                <div class="icon">
                    <img src="img/descuento.svg" alt="Administrar Usuarios">
                </div>
            </div>
            <div class="card-tabla">
                <div class="texto">
                    <a href="../api-plantas/index.php" class="fw-300 centrar-texto">Productos</a>
                </div>
                <div class="icon">
                    <img src="img/tienda-de-telefonos-moviles.svg" alt="Administrar Usuarios">
                </div>
            </div>
            <div class="card-tabla">
                <div class="texto">
                    <a href="../api-compras/index.php" class="fw-300 centrar-texto">Compras</a>
                </div>
                <div class="icon">
                    <img src="img/carro-de-la-compra.svg" alt="Administrar Usuarios">
                </div>
            </div>
            <div class="card-tabla">
                <div class="icon">
                    <img src="img/globos-de-texto.svg" alt="Administrar Usuarios">
                </div>
            </div>
            <div class="card-tabla">
                <div class="texto">
                    <a href="../api-categorias/index.php" class="fw-300 centrar-texto">Categorias</a>
                </div>
                <div class="icon">
                    <img src="img/cuadrados-diferentes.svg" alt="Administrar Usuarios">
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer ">
        <div class="contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer>
</body>

</html>