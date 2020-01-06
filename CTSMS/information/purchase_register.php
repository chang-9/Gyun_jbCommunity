<?
include("../mysql.php");

if($_POST['sale_date2']){

	$sale_date=$_POST['sale_date2'];//등록일자
	$sale_manager=$_POST['sale_manager2'];//담당자
	$sale_company =$_POST['sale_company2'];//거래처
	$sale_blank =$_POST['sale_blank2'];//비고
	
	$arrayadd_stock_num2 =$_POST['add_stock_num2'];//상품번호
	$arrayadd_name2 =$_POST['add_name2'];//상품명
	$arrayadd_date2 =$_POST['add_date2'];//제조일자
	$arrayadd_size2 =$_POST['add_size2'];//중량(g)
	$arrayadd_allcount2 =$_POST['add_allcount2'];//현재수량
	$arrayadd_count2 =$_POST['add_count2'];//판매수량
	$arrayoneprice2 =$_POST['oneprice2'];//단가
	$arraysaleprice2 =$_POST['saleprice2'];//할인가
	//$arrayadd_sort2 =$_POST['add_sort2'];//거래구분
	$arrayblank2 =$_POST['blank2'];//비고
	$k=0;
	$count_sum=0;

	$sum_allcount_result =$_POST['sum_allcount_result'];
	$sum_sellprice_result =$_POST['sum_sellprice_result'];
	
	
    /*stock_sp 테이블 index_num 맨끝 번호*/
	$stock_sp_info="SELECT index_num
				 FROM stock_sp
				 ORDER BY index_num DESC
				 ";
	$stock_sp_info_result=mysqli_query($conn,$stock_sp_info);
	$stock_sp_num = mysqli_fetch_array($stock_sp_info_result);

	$index_num_sp=$stock_sp_num['index_num']+1;
	$index=$index_num_sp;	

		/*stock_sp 등록*/
		$stock_sp_query="INSERT INTO stock_sp
					  (index_num, sort, date, manager, company, stock_count, total_price, return_price, price, dc_price, blank)
					  VALUES
					  ($index,'매입','$sale_date','$sale_manager','$sale_company','$sum_allcount_result','$sum_sellprice_result',0,0,0,'$sale_blank')";
		$stock_sp_result=mysqli_query($conn,$stock_sp_query);

	/*매출 등록*/
	for($i=0; $i<count($arrayadd_stock_num2);$i++){

		$stock_info="SELECT * FROM stock INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock.goods_name='$arrayadd_name2[$i]'";

		$stock_info_result=mysqli_query($conn,$stock_info);
		$stock_num = mysqli_fetch_array($stock_info_result);

		$stock_num_join[$i]=$stock_num['stock_num'];
		$sale_price_sum=$sale_price_sum+$arraysaleprice2[$i];

		$stock_sp_price_query="UPDATE stock_sp SET dc_price=$sale_price_sum WHERE index_num=$index";
		$stock_sp_price_result=mysqli_query($conn,$stock_sp_price_query);

		/*stock_sp_joint 등록*/
		$stock_sp_joint_query="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, size, price, dc_price, blank, sort, count, state) VALUES ($index,$stock_num_join[$i],'$arrayadd_name2[$i]','$arrayadd_size2[$i]','$arrayoneprice2[$i]','$arraysaleprice2[$i]','$arrayblank2[$i]','매입','$arrayadd_count2[$i]','입고예정')";
		$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query);
	



       echo "<meta charset='utf-8'><script>alert('매입이 등록 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/information/purchase.php');
		</script>";
}


  
}
?>