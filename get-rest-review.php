<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$id = $_POST["restaurant_id"];
$approved = 1;
$query = $mysqli->prepare("SELECT * from reviews WHERE restaurants_restaurant_id = ? AND approved = ?");
$query->bind_param("ii", $id, $approved);
$query->execute();
$array = $query->get_result();
$response = [];
while($review = $array->fetch_assoc()){
    $response[] = $review;
} 
$json = json_encode($response);
echo $json;

?>