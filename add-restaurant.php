<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
if(isset($_POST["restaurant_name"])){
    $restaurant_name = $_POST["restaurant_name"];
}
if(isset($_POST["location"])){
    $location =$_POST["location"];
}
if(isset($_POST["restaurant_img"])){
    $restaurant_image =$_POST["restaurant_img"];
}


$rating = 5;


$query = $mysqli->prepare("INSERT INTO restaurants (restaurant_name, location, rating, restaurant_image) VALUES (?, ?, ?, ?)");
$query->bind_param("ssds", $restaurant_name, $location, $rating, $restaurant_image);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>


