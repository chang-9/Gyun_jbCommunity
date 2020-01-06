


<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");


$barcode_num = $_POST['barcode_num'];
$result = mysqli_query($con,"SELECT a.stock_num, a.product_name,a.sort,a.size,a.goods_date,a.price,a.stock_count,b.barcode_num
 from stock_inout_joint a inner join stock_joint b on a.stock_num = b.stock_num where barcode_num =880226161031");
$response  = array();




while ($row = mysqli_fetch_array($result)) {
 # code...

 array_push($response, array("stock_num"=>$row[0],"product_name"=>$row[1],"sort"=>$row[2],"goods_size"=>$row[3],"goods_date"=>$row[4],"price"=>$row[5],"stock_count"=>$row[6],"barcode_num"=>$row[7]));
}


//echo json_encode(array("response"=>$response));
echo json_encode(array("response"=>$response));
mysqli_close($con);

?>
