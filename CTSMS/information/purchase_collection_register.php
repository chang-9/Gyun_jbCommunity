
<?
include("../mysql.php");

if($_POST['hidden_index']){
	 
	 $sp_num=$_POST['hidden_index'];
	 //echo "$index_num<br><br>";

	 $sum_price=0;

	for($i=0; $i<count($_POST['date']); $i++){

		$date[$i]=$_POST['date'][$i];//일자
		$price[$i]=$_POST['price'][$i];//지급액
		$sort[$i]=$_POST['sort'][$i];//구분
		$account[$i]=$_POST['account'][$i];//계좌
		$blank[$i]=$_POST['blank'][$i];//비고

		//echo "$i<br>$date[$i]<br>$price[$i]<br>$sort[$i]<br>$account[$i]<br>$blank[$i]<br>";
        //echo "-----------------------------------------<br>";

		/*stock_collection 등록*/
		$stock_collection_query="INSERT INTO stock_collection
					  (sp_num, division, date, price, sort,  account, blank)
					  VALUES
					  ($sp_num,'지급','$date[$i]',$price[$i],'$sort[$i]','$account[$i]','$blank[$i]')";
		$stock_collection_result=mysqli_query($conn,$stock_collection_query);

		$sum_price=$sum_price+$price[$i];

	}

	for($j=0; $j<count($_POST['collection_index_num']); $j++){


        $collection_index_num[$j]=$_POST['collection_index_num'][$j];//index_num
		$collection_date[$j]=$_POST['collection_date'][$j];//일자
		$collection_price[$j]=$_POST['collection_price'][$j];//지급액
		$collection_sort[$j]=$_POST['collection_sort'][$j];//구분
		$collection_account[$j]=$_POST['collection_account'][$j];//계좌
		$collection_blank[$j]=$_POST['collection_blank'][$j];//비고

		/*stock_collection 수정*/
			$query="UPDATE stock_collection
					SET 
                    date='$collection_date[$j]', price=$collection_price[$j], sort='$collection_sort[$j]', account='$collection_account[$j]', blank='$collection_blank[$j]'    
					WHERE index_num=$collection_index_num[$j]";
			$result=mysqli_query($conn,$query);

			$sum_price=$sum_price+$collection_price[$j];

	}

	/*stock_sp 수정*/
			$query2="UPDATE stock_sp
					SET 
                    price=$sum_price 
					WHERE index_num=$sp_num";
			$result2=mysqli_query($conn,$query2);

	 echo "<meta charset='utf-8'><script>alert('지급 등록이 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/information/purchase_pay.php');
		</script>";
}


?>