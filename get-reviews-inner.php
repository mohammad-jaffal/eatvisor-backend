<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$query = $mysqli->prepare("SELECT restaurants.restaurant_name, users.username, reviews.review_id, reviews.rating, reviews.review_text
FROM reviews INNER JOIN restaurants ON reviews.restaurants_restaurant_id = restaurants.restaurant_id INNER JOIN users ON reviews.users_user_id = users.user_id WHERE reviews.approved = 0");
$query->execute();
$array = $query->get_result();
$response = [];
while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
} 
$json = json_encode($response);
echo $json;

?>