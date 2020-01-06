<?
include("../mysql.php");

if($_POST['start_date']){



	/*$sp_date[$i]=$data['date'];//일자
						$sp_date_collection[$i]=$data['date_collection'];//일자
						$sp_total_price[$i]=$data['SUM(total_price)'];//매출액
						$sp_return_price[$i]=$data['SUM(return_price)'];//반품액
						$sp_price[$i]=$data['SUM(price)'];//수금액*/


	            $sum_total_price=0;
				$sum_return_price=0;
				$sum_price=0;
				$start_date=$_POST['start_date'];
				$end_date=$_POST['end_date'];


                $query="SELECT *
						FROM stock_sp
						WHERE sort='매입' AND date BETWEEN '$start_date' and '$end_date+1'";
				$result=mysqli_query($conn,$query);

				
                 $i=0;
				 while($data=mysqli_fetch_array($result)){
				

						$sp_total_price[$i]=$data['total_price'];
						$sum_total_price=$sum_total_price+$sp_total_price[$i];
						$sp_return_price[$i]=$data['return_price'];
						$sum_return_price=$sum_return_price+$sp_return_price[$i];

					


						$i++;
				 }


				 $query2="SELECT *
						FROM stock_collection
						WHERE division='지급' AND date BETWEEN '$start_date' and '$end_date+1'";
				$result2=mysqli_query($conn,$query2);

				
                 $j=0;
				 while($data2=mysqli_fetch_array($result2)){
				

						$sp_price[$j]=$data2['price'];
						$sum_price=$sum_price+$sp_price[$j];

					


						$j++;
				 }
}
?>

<tr>
<td data-title="총 매입액:" style="text-align: center;"><?=number_format($sum_total_price)?></td>										
<td data-title="총 반품액:" style="text-align: center;"><?=number_format($sum_return_price)?></td>									
<td data-title="총 지급액:" style="text-align: center;"><?=number_format($sum_price)?></td>
</tr>