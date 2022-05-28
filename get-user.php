<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$id = $_POST["user_id"];
$query = $mysqli->prepare("SELECT * from users WHERE user_id = ?");
$query->bind_param("i", $id);
$query->execute();
$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
} 
$json = json_encode($response);
echo $json;

?>