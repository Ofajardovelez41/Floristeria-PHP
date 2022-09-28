<!-- <?php
session_start();
if(empty($_SESSION['user_Admin'])){
    header('Location: index.php');
}
?> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrando Categorias</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/mensajes.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="css/mensajes.css">
</head>
<body>
    <!-- Header -->
    <header class="site-header">
        <!-- Contenido -->
        <div class="contenedor contenido-header">
            <!-- Barra -->
            <div class="barra">
                <!-- Imagen del Logo -->
                <a href="../apiadmin/home.php"><h1>Flower-shop</h1></a>

                <!-- Barra de Navegacion -->
                <div class="mensaje-saludo">
                    <p>Bienvenido <?php echo $_SESSION['user_Admin']?>!!</p>
                    <a class="logout boton boton-rojo boton-salir" href="../apiadmin/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </header>
    <main class="seccion">
        <h2 class="fw-300 centrar-texto titulo-msj">Mensajes</h2>
        <div class="contenido-principal">
            <section class="section-busqueda">
                <input type="search" name="buscar" id="buscar"> <a href="#" class="boton boton-verde boton-buscar">Buscar</a>
                <!-- <div class="resultado">
                    <ul class="listado-msj">
                        <li><tr  id-mensaje="${mensaje.id}">
                            <td class="td-mensaje id-mensaje">12356</td>
                            <td class="td-mensaje">Belen</td>
                            <td class="td-mensaje">Rosas</td>
                            <td class="td-mensaje"><input type="button" value="Borrar" class="boton boton-rojo boton-responder borrar-mensaje">
                            <input type="button" value="Responder" class="boton boton-rojo boton-responder responder-mensaje item-mensaje"></td>
                        </tr></li>
                        <li>123</li>
                        <li>312</li>
                    </ul>
                </div> -->
            </section>
            <section class="section-form">
                    <form action="" id="form-mensaje">
                        <div class="datos">
                            <input type="hidden" id="id-mensaje">
                            <input type="text" name="id_Admin" id="id_Admin" requerid autocomplete="off" placeholder="Admin" disable>
        
                            <textarea name="contenido-msj" id="contenido-msj" requerid placeholder="Mensaje"></textarea>
                        </div>
            
                        <button type="submit" class="boton boton-negro responder-boton">Enviar Respuesta</button>
                    </form>
            </section>
        
            <section class="listado-mensajes">
                <table>
                    <thead class="thead">
                        <tr>
                            <th class="th-principal centrar-texto">id</th>
                            <th class="th-principal centrar-texto">Usuario</th>
                            <th class="th-principal centrar-texto">Producto</th>
                            <th class="th-principal centrar-texto">Mensaje</th>
                            <th class="th-principal centrar-texto">Respuesta</th>
                            <th class="th-principal centrar-texto">action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <!-- Footer -->
    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <p class="copyrigth">Todos los Derechos Reservados 2020 &copy;, @Unicordoba - Deyser Orozco & Osmaider Garces</p>
        </div>
    </footer>
</body>
</html>