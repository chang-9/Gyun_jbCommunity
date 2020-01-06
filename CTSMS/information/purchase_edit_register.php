
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

		  

	}





/*추가*/
	$hidden_index=$_POST['hidden_index'];//stock_sp테이블 index_num
	$add_name=$_POST['add_name'];//상품명
	$add_size=$_POST['add_size'];//중량
	$add_allcount=$_POST['add_allcount'];//현재수량
	$add_count=$_POST['add_count'];//수량
	$saleprice=$_POST['saleprice'];//할인
	$sellprice=$_POST['sellprice'];//매입가 
    $add_stock_num=$_POST['add_stock_num'];//상품번호
    $blank=$_POST['blank'];//비고
    $oneprice=$_POST['oneprice'];//단가	 

	if(count($add_stock_num)!=0){//추가 원재료가 존재할 경우

		/*stock_inout_joint 테이블 index_num 맨끝 번호*/
		/*$add_stock_inout_joint_info="SELECT index_num
										 FROM stock_sp
										 ORDER BY index_num DESC
										 ";
		$add_stock_inout_joint_result=mysqli_query($conn,$add_stock_inout_joint_info);
		$add_stock_inout_joint_num = mysqli_fetch_array($add_stock_inout_joint_result);

		$add_joint_index=$add_stock_inout_joint_num['index_num'];*/
				
	for($a=0; $a<count($add_stock_num);$a++){
    
			$stock_sp="SELECT * FROM stock_sp WHERE index_num=$hidden_index";
			$stock_sp_re=mysqli_query($conn,$stock_sp);
			$stock_sp_re_array = mysqli_fetch_array($stock_sp_re);
			$stock_count_result=$stock_sp_re_array['stock_count'];
			$total_price=$stock_sp_re_array['total_price'];
			$dc_price=$stock_sp_re_array['dc_price'];

			$stock_count[$a]=$stock_count_result+$add_count[$a];
			$total_price_sum[$a]=$total_price+$sellprice[$a];
			$dc_price_sum[$a]=$dc_price+$saleprice[$a];
				

			/*stock_sp 수정*/
			$stock_sp_query="UPDATE stock_sp SET stock_count=$stock_count[$a],total_price=$total_price_sum[$a],dc_price=$dc_price_sum[$a] WHERE index_num=$hidden_index";
			$stock_sp_result=mysqli_query($conn,$stock_sp_query);
			
			$stock_info="SELECT * FROM stock INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock.goods_name='$add_name[$a]'";

			$stock_info_result=mysqli_query($conn,$stock_info);
			$stock_num = mysqli_fetch_array($stock_info_result);

			$stock_num_join[$a]=$stock_num['stock_num'];


			/*stock_sp_joint 등록*/
			$stock_sp_joint_query="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, size, price, dc_price, blank, count, state) VALUES ($hidden_index,$stock_num_join[$a],'$add_name[$a]','$add_size[$a]','$oneprice[$a]','$saleprice[$a]','$blank[$a]','$add_count[$a]','입고예정')";

			$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query);
		}
	}




/*추가 끝*/


	echo "<meta charset='utf-8'><script>alert('매입 수정이 완료되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/purchase.php');
	</script>";
	
}
?>