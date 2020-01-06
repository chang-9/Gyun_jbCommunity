<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
$result = mysqli_query($con,"SELECT *FROM stock_inout where sort='출고';");
$response  = array();

while ($row = mysqli_fetch_array($result)) {
  # code...
  array_push($response, array("index_num"=>$row[0],"inout_num"=>$row[1],"date"=>$row[3],"manager"=>$row[4],"warehouse"=>$row[5]
,"company"=>$row[6],"total_count"=>$row[7],"price"=>$row[8],"blank"=>$row[10]));
}
echo json_encode(array("response"=>$response));
mysqli_close($con);

 ?>
