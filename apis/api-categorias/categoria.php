<?php
include('../database.php');

$id = $_POST['id'];

$query = "SELECT * FROM categorias WHERE id_Categoria = '$id'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_Categoria'],
            'nombre' => $row['Nombre'],
            'imagen' => $row['imagen']
        );
    }

    $jsonString = json_encode($json[0]);

echo $jsonString;
?>