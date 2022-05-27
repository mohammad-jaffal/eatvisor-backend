<?php
include("connection.php");
$email = $_POST["email"];
// $password = hash("sha256", $_POST["password"]);
$password =$_POST["user_password"];
$query = $mysqli->prepare("Select user_id from users where email = ? AND user_password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();
$response = [];
if($num_rows == 0){
    $response["response"] = "User Not Found";
}else{
    $_SESSION["response"] = "Logged in";
    $_SESSION["user_id"] = $id;
}
echo $_SESSION['response'];
?>