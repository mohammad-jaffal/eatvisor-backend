<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$response = [];
$response["success"] = true;

if(isset($_POST["restaurant_id"])){
    $restaurant_id = $_POST["restaurant_id"];
}
else{
    $response["success"] = false;
}


$query = $mysqli->prepare("SELECT AVG(rating) FROM reviews WHERE restaurants_restaurant_id = ?");
$query->bind_param("i", $restaurant_id);
$query->execute();
$array = $query->get_result();
$response = [];
while($review = $array->fetch_assoc()){
    $response[] = $review;
} 
$json = json_encode($response);
echo $json;

