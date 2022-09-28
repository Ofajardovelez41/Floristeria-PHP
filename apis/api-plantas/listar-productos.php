<?php
include('../database.php');

session_start();
// if (isset($_SESSION['usuario'])) {
//     $_SESSION['usuario'] = $user;
// } 

$query = "SELECT productos.*, categorias.Nombre FROM productos, categorias WHERE productos.Categorias_idCategorias = categorias.id_Categoria";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_producto'],
            'nombreCategoria' => $row['Nombre'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'stock' => $row['cantidad_stock'],
            'imagen' => $row['imagen']
        );
    }

    $jsonString = json_encode($json);

echo $jsonString;
?>