<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
$result = mysqli_query($con,"SELECT *FROM stock;");
$response  = array();

while ($row = mysqli_fetch_array($result)) {
  # code...
  array_push($response, array("index_num"=>$row[0],"goods_brand"=>$row[1],"sort"=>$row[2],"goods_name"=>$row[3],"goods_size"=>$row[4]
,"supply_company"=>$row[5]));
}
echo json_encode(array("response"=>$response));
mysqli_close($con);

 ?>
