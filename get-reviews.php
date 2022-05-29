<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$query = $mysqli->prepare("SELECT * from reviews WHERE approved = 0");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 
$json = json_encode($response);
echo $json;

?>