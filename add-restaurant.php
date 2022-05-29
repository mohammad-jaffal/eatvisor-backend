<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$restaurant_name = $_POST["restaurant_name"];
$location =$_POST["location"];
$rating = 5;
$restaurant_image =$_POST["restaurant_img"];

$query = $mysqli->prepare("INSERT INTO restaurants (restaurant_name, location, rating, restaurant_image) VALUES (?, ?, ?, ?)");
$query->bind_param("ssds", $restaurant_name, $location, $rating, $restaurant_image);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>


