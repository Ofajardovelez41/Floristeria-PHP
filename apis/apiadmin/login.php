<?php
include('../database.php');

session_start();
if (isset($_SESSION['user_Admin'])) {
   $sesion = true;
} 


$query = "SELECT * FROM administrador_global";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json = array(
            'id' => $row['id_Admin'],
            'user' => $row['user_Admin'],
            'pass' => $row['pass_Admin']
        );
    }

    $jsonString = json_encode($json);
if($count==1){
    $_SESSION['user_Admin']=$json['user'];
}

    
    echo $jsonString;
?>