<?php


$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");

$id = $_POST["id"];
$password = $_POST["password"];

$statement = mysqli_prepare($con, "SELECT *FROM membership WHERE id = ? AND password = ?");
mysqli_stmt_bind_param($statement, "ss",$id,$password);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement,$id,$password,$name,$phone);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
  $response["success"] = true;
  $response["id"] = $id;
  $response["password"] = $password;
  $response["name"] = $name;
$response["phone"] = $phone;
 }

echo json_encode($response);
 ?>
