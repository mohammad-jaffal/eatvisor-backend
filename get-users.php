<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$query = $mysqli->prepare("SELECT user_id, username, email, user_bio, profile_picture from users WHERE type = 1");
$query->execute();
$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
} 
$json = json_encode($response);
echo $json;

?>