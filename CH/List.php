<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
$result = mysqli_query($con,"SELECT *FROM client;");
$response  = array();

while ($row = mysqli_fetch_array($result)) {
  # code...
  array_push($response, array("client_type"=>$row[1],"company_name"=>$row[2],"business_num"=>$row[3],"representative"=>$row[4],"tel"=>$row[5]
,"fax_num"=>$row[6],"sale_type"=>$row[7],"item"=>$row[8],"address"=>$row[9],"e_mail"=>$row[10]));
}
echo json_encode(array("response"=>$response));
mysqli_close($con);

 ?>
