<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
mysqli_set_charset($con,"utf8");

$id = $_POST["id"];
$password = $_POST["password"];
$name = $_POST["name"];
$phone = $_POST["phone"];


$statement = mysqli_prepare($con, "INSERT INTO membership (
 `index_num` ,
 `id` ,
 `password` ,
 `name`    ,
  `phone`
)
VALUES (
 NULL , '$id', '$password', '$name','$phone'
)");

// mysqli_stmt_bind_param($statement, "sssi",$ackind,$acplace, $acname,$acphone);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);


 ?>
