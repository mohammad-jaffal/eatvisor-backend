<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");

if(isset($_POST["review_id"])){
    $review_id = $_POST["review_id"];
}

$query = $mysqli->prepare("DELETE FROM reviews WHERE review_id = $review_id");
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>

