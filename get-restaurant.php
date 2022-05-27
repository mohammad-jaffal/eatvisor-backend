<?php
include("connection.php");
$id = $_POST["restaurant_id"];
$query = $mysqli->prepare("SELECT * from restaurants where restaurant_id = ?");
$query->bind_param("i", $id);
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 
$json = json_encode($response);
echo $json;

?>