<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
if(isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];
}
if(isset($_POST["restaurant_id"])){
    $restaurant_id = $_POST["restaurant_id"];
}
if(isset($_POST["rating"])){
    $rating = $_POST["rating"];
}
if(isset($_POST["review_text"])){
    $review_text = $_POST["review_text"];
}



$approved = 0;
$query = $mysqli->prepare("INSERT INTO reviews (users_user_id, restaurants_restaurant_id, rating, review_text, approved) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("iiisi", $user_id, $restaurant_id, $rating, $review_text, $approved);
$query->execute();
$response = [];
$response["success"] = true;

echo json_encode($response);
?>


