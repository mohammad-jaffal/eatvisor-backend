<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$review_id = $_POST["review_id"];


$query = $mysqli->prepare("UPDATE reviews SET approved = 1 WHERE review_id = $review_id");
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>

