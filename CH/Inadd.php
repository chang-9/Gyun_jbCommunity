<?php
$con = mysqli_connect("localhost","ccit","CCITmobile07","ccit");
mysqli_set_charset($con,"utf8");

$date = $_POST["date"];
$company = $_POST["company"];
$warehouse = $_POST["warehouse"];
$manager = $_POST["manager"];
$blank = $_POST["blank"];


$stock_num = $_POST["index_num"];
$sort = $_POST["sort"];
$product_name = $_POST["goods_name"];
$size = $_POST["goods_size"];
$price = $_POST["price"];
$stock_count = $_POST["stock_count"];
//$check=$_GET["check"];

/*입고 코드*/
$date1 = date("Y-m-d");
//echo $date;

echo $manager;
echo $check;


$total_price = $stock_count*$price;
//echo $total_price;

/*stock_inout 테이블 index_num 맨끝 번호*/
$stock_inout_info="SELECT index_num
             FROM stock_inout
          ORDER BY index_num DESC
          ";
$stock_inout_info_result=mysqli_query($con,$stock_inout_info);
$stock_inout_num = mysqli_fetch_array($stock_inout_info_result);

$index_num2=$client_num['index_num']+1;


                     if($index_num2<10){
                        $index_num2="000$index_num2";
                     }else if($index_num2<100){
                        $index_num2="00$index_num2";
                     }else if($index_num2<1000){
                        $index_num2="0$index_num2";
                     }else{
                        $index_num2="$index_num2";
                     }


$date2 = str_replace('-','',$date1);
$date = substr($date2, 2, 12);
$inout_num3 = $date . "" . $index_num2;



$stock_inout_info2 = "SELECT index_num
FROM stock_inout ORDER BY index_num DESC";
$stock_inout_info2_result2 = mysqli_query($con,$stock_inout_info2);
$stock_inout_num2 = mysqli_fetch_array($stock_inout_info2_result2);
$index_num6 = $stock_inout_num2['index_num']+1;

$stock_inout_query4= mysqli_prepare($con,"INSERT INTO stock_inout
         (`index_num`,`inout_num`,`sort`,`date`,`manager`,`warehouse`,`company`,`total_count`,`price`,`check`,`blank`)
         VALUES($index_num6,'$inout_num3','입고','$date','$manager','$warehouse','$company','$stock_count'
           ,'$total_price','사용','$blank')");
mysqli_stmt_execute($stock_inout_query4);

$response2 = array();
$response2["success"] = true;

echo json_encode($response2);
if ($stock_inout_query4) {
  echo "yes";
  # code...
}else {
  echo "실패";
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////


$stock_inout_joint_info="SELECT index_num FROM stock_inout_joint ORDER by index_num DESC";

$stock_inout_joint_result=mysqli_query($con,$stock_inout_joint_info);
$stock_inout_joint_num = mysqli_fetch_array($stock_inout_joint_result);
$index_num4=$stock_inout_joint_num['index_num']+1;


$count=0;
$totalprice2=0;

$tax = $price/10;


$stock_inout_joint_query = mysqli_prepare($con, "INSERT INTO stock_inout_joint (
 `index_num`,
 `inout_num`,
 `stock_num`,
 `sort`,
 `goods_sort`,
 `product_name`,
 `goods_date`,
 `size`,
`price`,
  `tax`,
  `stock_count`
)
VALUES (
 $index_num4, '$inout_num3','$stock_num','$sort','내포장상품', '$product_name','$date','$size','$price','$tax','$stock_count'
)");

// mysqli_stmt_bind_param($statement, "sssi",$ackind,$acplace, $acname,$acphone);
mysqli_stmt_execute($stock_inout_joint_query);

$response = array();
$response["success"] = true;

echo json_encode($response);
if($stock_inout_joint_query){
  echo "yes";
}else {
  echo "no";
}
 ?>
