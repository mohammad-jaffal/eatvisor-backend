<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");


if(isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];
}
if(isset($_POST["bio"])){
    $bio = $_POST["bio"];
}

$query = $mysqli->prepare("UPDATE users SET user_bio = ? WHERE user_id = ?");
$query->bind_param("si", $bio, $user_id);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>
