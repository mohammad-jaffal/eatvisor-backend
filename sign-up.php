<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

$response = [];
$response["success"] = false;

if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["user_password"])){
    $password = hash("sha256", $_POST["user_password"]);
}
if(isset($_POST["username"])){
    $username =$_POST["username"];
}



$type = 1;
$image_url = "image later";
$bio = "bio later too";

$query = $mysqli->prepare("INSERT INTO users (username, email, user_password, type, profile_picture, user_bio) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("sssiss", $username, $email, $password, $type, $image_url, $bio);
$query->execute();


$response["success"] = true;

echo json_encode($response);
?>