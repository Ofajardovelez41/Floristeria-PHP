<?php
    include('database.php');

        
        $nid = $_POST['nid'];
        $pais = $_POST['pais'];
        $dpto = $_POST['dpto'];
        $ciudad = $_POST['ciudad'];
        $municipio = $_POST['municipio'];
        $barrio = $_POST['barrio'];
        $direccion = $_POST['direccion'];
        $infoAdicional = $_POST['infoAdicional'];

        $query = "INSERT INTO `direccion` (`idDireccion`, `Usuarios_nid`, `pais`, `departamento`, `ciudad`, `municipio`, `barrio`, `direccion`, `informacion_adicional`) VALUES (NULL, '$nid', '$pais', '$dpto', '$ciudad', '$municipio', '$barrio', '$direccion', '$infoAdicional');";

        $res = mysqli_query($con, $query);
        if(!$res){
            die('La consulta ah fallado');
        }

        echo 'Direccion agregada al Usuario';
?>