
<?include("../mysql.php");?>
<?
if(isset($_POST['btn_edit'])){

	$hidden_index=$_POST['hidden_index'];//stock_sp테이블 index_num
	$sale_date=$_POST['sale_date'];//일자
	$sale_company=$_POST['sale_company'];//거래처명
	$sale_blank=$_POST['sale_blank'];//비고
	$sum_count=$_POST['h_joint_sum_count'];//총 수량
	$sum_sale_price=$_POST['h_joint_sum_sale_price'];//총 합계(판매가)
	$sum_return_sale_price=$_POST['h_joint_sum_return_sale_price'];//총 반품계
	$sum_dc_price=$_POST['h_joint_sum_dc_price'];//총 할인계

	//echo "$hidden_index<br>$sale_date<br>$sale_company<br>$sale_blank<br>$sum_count<br>$sum_sale_price<br>$sum_return_sale_price<br>$sum_dc_price";

	/*stock_sp 수정*/
			$stock_sp_query="UPDATE stock_sp
									 SET date='$sale_date',company='$sale_company',stock_count=$sum_count,total_price=$sum_sale_price,return_price=$sum_return_sale_price,dc_price=$sum_dc_price,blank='$sale_blank'
									 WHERE index_num=$hidden_index";
			$stock_sp_result=mysqli_query($conn,$stock_sp_query);


	//echo count($_POST['joint_index_num']);

	for($i=0; $i<count($_POST['joint_index_num']); $i++){

         $joint_index_num[$i]=$_POST['joint_index_num'][$i];//stock_sp_joint테이블 index_num
         $joint_count[$i]=$_POST['joint_count'][$i];//수량
		 $joint_price[$i]=$_POST['joint_price'][$i];//단가(원)
		 $joint_dc_price[$i]=$_POST['joint_dc_price'][$i];//할인가
		 $joint_sort[$i]=$_POST['joint_sort'][$i];//거래구분
		 $joint_blank[$i]=$_POST['joint_blank'][$i];//비고
		 $joint_state[$i]=$_POST['joint_state'][$i];//출고 상태
		 $joint_fixed_original_count[$i]=$_POST['joint_fixed_original_count'][$i];//수정전 수량
		 $joint_original_sort[$i]=$_POST['joint_original_sort'][$i];//수정전 거래구분


		 //echo "$joint_index_num[$i]<br>$joint_count[$i]<br>$joint_price[$i]<br>$joint_dc_price[$i]<br>$joint_sort[$i]<br>$joint_blank[$i]<br>";
		 //echo "-----------------------------------------------------------<br>";

		    /*stock_sp_joint 수정*/
			$stock_sp_joint_query="UPDATE stock_sp_joint
									 SET count=$joint_count[$i],price=$joint_price[$i],dc_price=$joint_dc_price[$i],sort='$joint_sort[$i]',blank='$joint_blank[$i]',state='$joint_state[$i]'
									 WHERE index_num=$joint_index_num[$i]";
			$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query);

		  if($joint_sort[$i]=="반품"){

			  $stock_sp_joint_query2="SELECT *
			                          FROM stock_sp_joint
									  WHERE index_num=$joint_index_num[$i]";
			  $stock_sp_joint_result2=mysqli_query($conn,$stock_sp_joint_query2);
			  $stock_sp_joint_data2=mysqli_fetch_array($stock_sp_joint_result2);
			  $sp_joint_stock_index[$i]=$stock_sp_joint_data2['stock_index'];

              $stock_joint_query="SELECT *
			                          FROM stock_joint
									  WHERE stock_num=$sp_joint_stock_index[$i]";
			  $stock_joint_result=mysqli_query($conn,$stock_joint_query);
			  $stock_joint_data=mysqli_fetch_array($stock_joint_result);
			  $joint_state_count[$i]=$stock_joint_data['state_count'];
			  $final_state_count=$joint_state_count[$i]-$joint_fixed_original_count[$i];

			  	
              $stock_joint_query2="UPDATE stock_joint
									 SET state_count=$final_state_count
									 WHERE stock_num=$sp_joint_stock_index[$i]";
			  $stock_joint_result2=mysqli_query($conn,$stock_joint_query2);

		  }else{

			  $stock_sp_joint_query2="SELECT *
			                          FROM stock_sp_joint
									  WHERE index_num=$joint_index_num[$i]";
			  $stock_sp_joint_result2=mysqli_query($conn,$stock_sp_joint_query2);
			  $stock_sp_joint_data2=mysqli_fetch_array($stock_sp_joint_result2);
			  $sp_joint_stock_index[$i]=$stock_sp_joint_data2['stock_index'];

			  $stock_joint_query="SELECT *
			                          FROM stock_joint
									  WHERE stock_num=$sp_joint_stock_index[$i]";
			  $stock_joint_result=mysqli_query($conn,$stock_joint_query);
			  $stock_joint_data=mysqli_fetch_array($stock_joint_result);
			  $joint_state_count[$i]=$stock_joint_data['state_count'];
			  if($joint_state_count[$i]==0){
				 $final_state_count=$joint_count[$i];
			  }else{
				  if($joint_original_sort[$i]=="반품"){
					  $final_state_count=$joint_state_count[$i]+$joint_count[$i];
				  }else{
			          $final_state_count=$joint_state_count[$i]-$joint_fixed_original_count[$i]+$joint_count[$i];
				  }
			  }

			  	
              $stock_joint_query2="UPDATE stock_joint
									 SET state_count=$final_state_count
									 WHERE stock_num=$sp_joint_stock_index[$i]";
			  $stock_joint_result2=mysqli_query($conn,$stock_joint_query2);
		  }

	}

	for($k=0; $k<count($_POST['joint_sale_count']); $k++){

		$sp_count_index_num[$k]=$_POST['sp_count_index_num'][$k];//stock_sp_count테이블 index_num
         $joint_sale_count[$k]=$_POST['joint_sale_count'][$k];//주문 수량

        /*stock_sp_count 수정*/
			$stock_sp_count_query="UPDATE stock_sp_count
									 SET count=$joint_sale_count[$k]
									 WHERE index_num=$sp_count_index_num[$k]";
			$stock_sp_count_result=mysqli_query($conn,$stock_sp_count_query);

	}


	if(isset($_POST['joint_count2'])){

		

		for($j=0; $j<count($_POST['joint_count2']); $j++){
			 $joint_index_num2[$j]=$_POST['joint_index_num2'][$j];//stock_sp_joint테이블 index_num
			 $joint_count2[$j]=$_POST['joint_count2'][$j];//수량
			 $joint_sort2[$j]=$_POST['joint_sort2'][$j];//거래구분
			 $joint_blank2[$j]=$_POST['joint_blank2'][$j];//비고

			  /*stock_sp_joint 수정*/
			$stock_sp_joint_query2="UPDATE stock_sp_joint
									 SET count=$joint_count2[$j],sort='$joint_sort2[$j]',blank='$joint_blank2[$j]'
									 WHERE index_num=$joint_index_num2[$j]";
			$stock_sp_joint_result2=mysqli_query($conn,$stock_sp_joint_query2);

		}
	}


/*추가*/
	$hidden_index=$_POST['hidden_index'];//stock_sp테이블 index_num
	$sale_sort=$_POST['add_sort'];	//완제품
    $add_stock_num=$_POST['add_stock_num'];//상품번호
    $sale_manager=$_POST['sale_manager'];//상품번호
	$sum_allcount_result =$_POST['sum_allcount_result'];
	$sum_sellprice_result =$_POST['sum_sellprice_result'];
	$sale_blank =$_POST['sale_blank'];//비고

	$arrayadd_name2 =$_POST['add_name'];
	$arrayadd_date2 =$_POST['add_date'];
	$arrayadd_size2 =$_POST['add_size'];
	$arrayoneprice2 =$_POST['oneprice'];
	$arraysaleprice2 =$_POST['saleprice'];
	$arrayblank2 =$_POST['blank'];
	$arrayadd_count2 =$_POST['add_count'];
	$arrayadd_ordercount2 =$_POST['joint_sale_count'];//주문수량


	if(count($add_stock_num)!=0){//추가 완제품 존재할 경우

		/*stock_inout_joint 테이블 index_num 맨끝 번호*/
		$add_stock_inout_joint_info="SELECT index_num
										 FROM stock_sp
										 ORDER BY index_num DESC
										 ";
		$add_stock_inout_joint_result=mysqli_query($conn,$add_stock_inout_joint_info);
		$add_stock_inout_joint_num = mysqli_fetch_array($add_stock_inout_joint_result);

		$add_joint_index=$add_stock_inout_joint_num['index_num'];
					
	for($i=0; $i<count($add_stock_num);$i++){
    
		//if($sale_sort[$i]=="완제품"){//완제품 출고

				$stock_sp="SELECT * FROM stock_sp WHERE index_num=$add_joint_index";
				$stock_sp_re=mysqli_query($conn,$stock_sp);
				$stock_sp_re_array = mysqli_fetch_array($stock_sp_re);
				$stock_count_result=$stock_sp_re_array['stock_count'];

				$stock_count[$i]=$stock_count_result+$arrayadd_count2[$i];


				/*stock_sp 등록*/
				$stock_sp_query="UPDATE stock_sp SET stock_count=$stock_count[$i] WHERE index_num=$add_joint_index";
				$stock_sp_result=mysqli_query($conn,$stock_sp_query);
		//}
			
			$stock_info="SELECT * FROM stock INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock.goods_name='$arrayadd_name2[$i]'";

			$stock_info_result=mysqli_query($conn,$stock_info);
			$stock_num = mysqli_fetch_array($stock_info_result);

			$stock_num_join[$i]=$stock_num['stock_num'];

			/*stock_sp_joint 등록*/
			$stock_sp_joint_query="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, date, size, price, dc_price, blank, sort, count, state) VALUES ($add_joint_index,$stock_num_join[$i],'$arrayadd_name2[$i]','$arrayadd_date2[$i]','$arrayadd_size2[$i]','$arrayoneprice2[$i]','$arraysaleprice2[$i]','$arrayblank2[$i]','매출','$arrayadd_count2[$i]','출고예정')";
			$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query);
	
			/*stock_sp_count 테이블 index_num 맨끝 번호*/
		$stock_sp_count_info="SELECT index_num
					 FROM stock_sp_count
					 ORDER BY index_num DESC
					 ";
		$stock_sp_count_info_result=mysqli_query($conn,$stock_sp_count_info);
		$stock_sp_count_num = mysqli_fetch_array($stock_sp_count_info_result);

		$index_num_sp_count=$stock_sp_count_num['index_num']+1;

		/*stock_sp_count 등록*/
			$stock_sp_count_query="INSERT INTO stock_sp_count
						  (index_num, sp_index, name, count)
						  VALUES
						  ($index_num_sp_count,$hidden_index,'$arrayadd_name2[$i]','$arrayadd_ordercount2[$i]')";
			$stock_sp_count_result=mysqli_query($conn,$stock_sp_count_query);
		}
	}
/*추가 끝*/

	echo "<meta charset='utf-8'><script>alert('매출 수정이 완료되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/sale.php');
	</script>";
	
}
?>