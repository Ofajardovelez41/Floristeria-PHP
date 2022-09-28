<?php
include('../database.php');

$id = $_POST['idUser'];

$query = "SELECT direccion.idDireccion, direccion.ciudad, direccion.municipio, direccion.barrio FROM direccion WHERE direccion.Usuarios_nid = '$id'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'idDireccion' => $row['idDireccion'],
            'ciudad' => $row['ciudad'],
            'municipio' => $row['municipio'],
            'barrio' => $row['barrio'],
        );
    }

    $jsonString = json_encode($json);

echo $jsonString;
?>