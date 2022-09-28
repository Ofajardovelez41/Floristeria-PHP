<?php
include('../database.php');

$id = $_POST['id'];

$query = "SELECT productos.*, categorias.Nombre FROM productos, categorias WHERE productos.Categorias_idCategorias = '$id' AND categorias.id_Categoria = '$id'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_producto'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'], 
            'cantidad_stock' => $row['cantidad_stock'],
            'nombreCategoria' => $row['Nombre'],
            'imagen' => $row['imagen']
        );
    }

    $jsonString = json_encode($json);

echo $jsonString;
?>