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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/categorias.js"></script>
    <link rel="stylesheet" href="/flower-shop/css/styles.css">
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/categorias.css">
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
    <div class="titulo tit1">
        <h2 class="fw-300 centrar-texto">Lista de Categorias</h2>
        <a href="#" class="agg"><img src="img/anadir.svg" alt="Añadir Categoria"></a>
    </div>

    <div class="titulo tit2">
        <h2 class="fw-300 centrar-texto">Agregando Categoria</h2>
        <a href="#" class="back"><img src="img/espalda.svg" alt="Añadir Categoria"></a>
    </div>
    <div class="cargando contenedor seccion">
            <img src="img/loading.svg" alt="">
    </div>
    <div class="contenido-principal">
        <main class="main-form">
                <form action="" id="form-categoria">
                    <div class="datos">
                        <input type="number" id="id-categoria" disabled>
                        <input type="text" name="nombre" id="nombre" requerid autocomplete="off" placeholder="Nombre">
                        <input type="file" name="imagen" id="imagen" placeholder="Imagen" accept="image/png, .jpeg, .jpg">

                    </div>
        
                    <button type="submit" class="boton boton-negro editar-boton">Agregar Categoria</button>
                </form>
        </main>
        <section class="listado-categorias">
            <table>
                <thead class="thead">
                    <tr>
                        <th class="th-principal centrar-texto">id</th>
                        <th class="th-principal centrar-texto">nombre</th>
                        <th class="th-principal centrar-texto">imagen</th>
                        <th class="th-principal centrar-texto">action</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                </tbody>
            </table>
        </section>
    </div>
    <!-- Footer -->
    <footer class="site-footer ">
        <div class="contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;</p>
            <address>@Unicordoba - Deyser Orozco & Osmaider Garces</address>
        </div>
    </footer>
</body>
</html>