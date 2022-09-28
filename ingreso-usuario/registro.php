<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/ingreso.js"></script>
</head>

<body>
    <header class="site-header secciones">
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
                <a href="login.php">Login</a>
            </nav>
        </div>
    </header>

    <main class="registro seccion">
        <h1 class="centrar-texto fw-300">Registrate</h1>
        <form action="" class="form-registro seccion contenedor">
            <div class="field">

                <fieldset>
                    <legend class="fw-300 centrar-texto">Datos Personales</legend>

                    <label for="tipo-id">Tipo de Documento</label>
                    <select name="tipo-id" id="tipo-id">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="Cedula">Cedúla</option>
                        <option value="Cedula Extranjera">Cedula Extranjera</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>

                    <label for="nid">N° Identificacion</label>
                    <input type="number" name="nid" id="nid" placeholder="N° de Identificacion" required
                        autocomplete="off">

                    <label for="nombre">Nombres</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres" required autocomplete="off">
                    <label for="apellido">Apellidos</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Apellidos" required
                        autocomplete="off">


                    <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha-nacimiento" id="fecha-nacimiento">
                </fieldset>

                <fieldset class="contacto">
                    <legend class="fw-300 centrar-texto">Datos de Contacto</legend>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="example@example.com" required
                        autocomplete="off">

                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" placeholder="Telefono" required autocomplete="off">
                </fieldset>

                <fieldset class="ingreso">
                    <legend class="fw-300 centrar-texto">Datos de Ingreso</legend>

                    <label for="user">User</label>
                    <input type="text" name="user" id="user" placeholder="Usuario" required autocomplete="off">

                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña" required autocomplete="off">
                </fieldset>

                <fieldset>
                    <legend class="fw-300 centrar-texto">Dirección</legend>

                    <label for="pais">País</label>
                    <input type="text" name="pais" id="pais" placeholder="País" required autocomplete="off">

                    <label for="dpto">Departamento</label>
                    <input type="text" name="dpto" id="dpto" placeholder="Departamento" required autocomplete="off">

                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required autocomplete="off">

                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" id="municipio" placeholder="Municipio" required
                        autocomplete="off">

                    <label for="barrio">Barrio</label>
                    <input type="text" name="barrio" id="barrio" placeholder="Barrio" required autocomplete="off">

                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" placeholder="CRA # N° XX-XX" required
                        autocomplete="off">

                    <label for="info-adicional">Información Adicional</label>
                    <input type="text" name="info-adicional" id="info-adicional"
                        placeholder="Casa #, Dpto #, Al lado de" required autocomplete="off">
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