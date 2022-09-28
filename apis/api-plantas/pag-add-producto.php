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
    <title>Administrando Categorias</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/productos.js"></script>
    <link rel="stylesheet" href="/flower-shop/css/styles.css">
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/plantas.css">
</head>
<body>
    <!-- Header -->
    <header class="site-header">
        <!-- Contenido -->
        <a href="../apiadmin/home.php" class="barra">
            <h1>
                Flower<span>Shop<span></h1>
        </a>

        <!-- Barra de Navegacion -->
        <div class="mensaje-saludo">
            <p>Bienvenido <?php echo $_SESSION['user_Admin']?>!!</p>
            <a class="logout boton boton-rojo boton-salir" href="logout.php">Salir</a>
        </div>
    </header>

    <div class="titulo">
        <h2 class="fw-300 centrar-texto">Plantas</h2>
        <a href="index.php"><img src="img/espalda.svg" alt="Añadir Planta"></a>
    </div>

    <main class="main-form seccion contenedor">
            <form action="" id="form-planta">
                <div class="datos">
                    <select name="categorias" id="categorias" class="categorias">
                        <option value="#" selected disabled>-- Seleccione Categoria --</option>
                    </select>
                    <input type="hidden" id="id-planta">
                    <input type="text" name="nombre" id="nombre" requerid autocomplete="off" placeholder="Nombre">
                    <input type="number" name="precio" id="precio" requerid autocomplete="off" placeholder="Precio">
                    
                    <textarea name="descripcion" id="descripcion" requerid placeholder="Descripcion"></textarea>

                    <input type="file" name="imagen" id="imagen" placeholder="Imagen">

                    <input type="number" name="cantidad_stock" id="cantidad_stock" requerid autocomplete="off" placeholder="Cantidad Stock">
                </div>
    
                <button type="submit" class="boton boton-negro editar-boton boton-planta">Agregar Planta</button>
            </form>
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