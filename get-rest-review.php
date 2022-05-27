<?php
include("connection.php");
$id = $_POST["restaurant_id"];
$query = $mysqli->prepare("SELECT * from reviews WHERE restaurants_restaurant_id = ?");
$query->bind_param("i", $id);
$query->execute();
$array = $query->get_result();
$response = [];
while($review = $array->fetch_assoc()){
    $response[] = $review;
} 
$json = json_encode($response);
echo $json;

?>