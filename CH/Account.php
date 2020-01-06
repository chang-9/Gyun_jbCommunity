<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
mysqli_set_charset($con,"utf8");

$client_type = $_POST["client_type"];
$company_name = $_POST["company_name"];
$business_num = $_POST["business_num"];
$representative = $_POST["representative"];
$sale_type = $_POST["sale_type"];
$item = $_POST["item"];
$tel = $_POST["tel"];
$fax_num = $_POST["fax_num"];
$address = $_POST["address"];
$e_mail = $_POST["e_mail"];
$division = $_POST["division"];



/*client 테이블 index_num 맨끝 번호*/
$client_info="SELECT index_num
             FROM client
          ORDER BY index_num DESC
          ";
$client_info_result=mysqli_query($con,$client_info);
$client_num = mysqli_fetch_array($client_info_result);

$index_num=$client_num['index_num']+1;


$statement = mysqli_prepare($con, "INSERT INTO client (
 `index_num`,
 `client_type`,
 `company_name` ,
 `business_num` ,
 `representative`,
`sale_type`,
  `item`,
  `tel`,
  `fax_num`,
  `address`,
  `e_mail`,
  `division`
)
VALUES (
 $index_num, '$client_type', '$company_name', '$business_num','$representative','$sale_type','$item','$tel','$fax_num','$address','$e_mail','$division'
)");

// mysqli_stmt_bind_param($statement, "sssi",$ackind,$acplace, $acname,$acphone);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);
if($statement){
  echo "yes";
}else {
  echo "no";
}

 ?>
