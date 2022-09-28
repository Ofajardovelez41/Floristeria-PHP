<?php
include('../database.php');

$query = "SELECT * FROM usuarios, direccion WHERE usuarios.nid = direccion.Usuarios_nid";

$res = mysqli_query($con, $query);

if(!$res){
    die('Query Failed' . mysqli_error($con));
}

$json = array();
while($row = mysqli_fetch_array($res)){
    $json[] = array(
        'tipo_id' => $row['tipo_id'],
        'nid' => $row['nid'],
        'nombres' => $row['nombres'],
        'apellidos' => $row['apellidos'],
        'fecha_nacimiento' => $row['fecha_nacimiento'],
        'email' => $row['email'],
        'telefono' => $row['telefono'],
        'username' => $row['username']
    );
}

$jsonString = json_encode($json);

echo $jsonString;
?>