


<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");


$inout_num = $_POST['inout_num'];
$result = mysqli_query($con,"SELECT *FROM stock_inout_joint where inout_num = $inout_num");
$response  = array();




while ($row = mysqli_fetch_array($result)) {
 # code...

 array_push($response, array("index_num"=>$row[0],"inout_num"=>$row[1],"sort"=>$row[2],"product_name"=>$row[3],"goods_date"=>$row[4],"size"=>$row[5],"price"=>$row[6],"tax"=>$row[7],"stock_count"=>$row[8]));
}


//echo json_encode(array("response"=>$response));
echo json_encode(array("response"=>$response));
mysqli_close($con);

?>
