<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$user_id = $_POST["user_id"];
$bio = $_POST["bio"];


$query = $mysqli->prepare("UPDATE users SET user_bio = ? WHERE user_id = ?");
$query->bind_param("si", $bio, $user_id);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>


