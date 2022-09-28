<?php
include('../database.php');

$id = $_POST['id'];

$query = "SELECT mensajes.id_Mensaje, mensajes.id_Admin, mensajes.respuesta FROM mensajes WHERE mensajes.id_Mensaje = '$id'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'id_Mensaje' => $row['id_Mensaje'],
            'id_Admin' => $row['id_Admin'],
            'respuesta' => $row['respuesta']
        );
    }

    $jsonString = json_encode($json[0]);

echo $jsonString;
?>