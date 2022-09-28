<?php
include('database.php');

session_start();
if (isset($_SESSION['usuario'])) {
} 

$user = $_POST['user'];
$pass = $_POST['pass'];


$query = "SELECT username, pass, nid FROM usuarios WHERE username = '$user' AND pass = '$pass'";

$res = mysqli_query($con, $query);

if(!$res){
    die("Query Failed" . mysqli_error($connection));
}

$count = mysqli_num_rows($res);

$json = array();
    while($row = mysqli_fetch_array($res)){
        $json = array(
            'user' => $row['username'],
            'pass' => $row['pass'],
            'nid' => $row['nid']
        );
    }

    $jsonString = json_encode($json);
if($count==1){
    $_SESSION['nid']=$json['nid'];
}

    
    echo $jsonString;
?>