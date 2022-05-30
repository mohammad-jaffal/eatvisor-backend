<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");



if(isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];
}
if(isset($_POST["profile_pic"])){
    $profile_pic = $_POST["profile_pic"];
}


$query = $mysqli->prepare("UPDATE users SET profile_picture = ? WHERE user_id = ?");
$query->bind_param("si", $profile_pic, $user_id);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);
?>


