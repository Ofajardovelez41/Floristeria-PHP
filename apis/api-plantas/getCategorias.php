<?php
include('../database.php');

$query = "SELECT categorias.id_Categoria, categorias.Nombre FROM categorias";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_Categoria'],
            'nombre' => $row['Nombre']
        );
    }

    $jsonString = json_encode($json);

echo $jsonString;
?>