<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");



if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["user_password"])){
    $password = hash("sha256", $_POST["user_password"]);
}




$query = $mysqli->prepare("Select user_id from users where email = ? AND user_password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows();
$query->bind_result($id);
$query->fetch();
$response = [];
if($num_rows == 0){
    $response["success"] = false;
}else{
    $response["success"] = true;
    $response["user_id"] = $id;
}

echo json_encode($response);
?>