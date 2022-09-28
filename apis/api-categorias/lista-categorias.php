<?php
include('../database.php');

$query = "SELECT * FROM categorias";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($con));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id' => $row['id_Categoria'],
            'nombre' => $row['Nombre'],
            'imagen' => $row['imagen']
        );
    }

    $jsonString = json_encode($json);
// if($count==1){
//     $_SESSION['user_Admin']=$json['user'];
// }

echo $jsonString;
?>