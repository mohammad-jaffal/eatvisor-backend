<?php
include("connection.php");
$id = $_POST["user_id"];
$query = $mysqli->prepare("SELECT * from reviews WHERE users_user_id = ?");
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