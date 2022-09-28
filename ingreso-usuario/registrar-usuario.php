<?php
    include('database.php');

        
        $tipoId = $_POST['tipoId'];
        $nid = $_POST['nid'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $query = "INSERT INTO usuarios (nid, tipo_id, nombres, apellidos, fecha_nacimiento, email, telefono, username, pass) VALUES ('$nid', '$tipoId', '$nombres', '$apellidos', '$fechaNacimiento', '$email', '$telefono', '$username', '$pass')";

        $res = mysqli_query($con, $query);
        if(!$res){
            die('La consulta ah fallado');
        }

        echo 'Usuario Registrado con Exito';
?>