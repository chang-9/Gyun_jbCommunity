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
	$arrayadd_ordercount2 =$_POST['add_ordercount2'];//주문수량
	$arrayadd_cost2 =$_POST['add_cost2'];//원가
	//$arrayadd_sort2 =$_POST['add_sort2'];//거래구분
	$arrayblank2 =$_POST['blank'];//비고
	$sum_arrayadd_count2=0;
	$h_stock_name =$_POST['h_stock_name'];//상품명
	$h_stock_size =$_POST['h_stock_size'];//중량

	$h_stock_joint_num =$_POST['h_stock_joint_num2'];



	$total_count=0;

	$idx=$_POST['add_index'];

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

	/*stock_sp_joint 테이블 index_num 맨끝 번호*/
	$stock_sp_joint_info="SELECT index_num
				 FROM stock_sp_joint
				 ORDER BY index_num DESC
				 ";
	$stock_sp_joint_info_result=mysqli_query($conn,$stock_sp_joint_info);
	$stock_sp_joint_num = mysqli_fetch_array($stock_sp_joint_info_result);

	//$index_num_sp_joint=$stock_sp_joint_num['index_num']+1;


	for($i=0; $i<count($arrayadd_name2);$i++){

		$total_count=$total_count+$arrayadd_ordercount2[$i];

		

		/*stock_sp 테이블 index_num 맨끝 번호*/
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
						  ($index_num_sp_count,$index_num_sp,'$arrayadd_name2[$i]','$arrayadd_ordercount2[$i]')";
			$stock_sp_count_result=mysqli_query($conn,$stock_sp_count_query);


	}


	/*stock_sp 등록*/
		$stock_sp_query="INSERT INTO stock_sp
					  (index_num, sort, date, manager, company, stock_count, total_price, return_price, price, dc_price, blank)
					  VALUES
					  ($index_num_sp,'매출','$sale_date','$sale_manager','$sale_company',$total_count,'$sum_sellprice_result',0,0,2000,'$sale_blank')";
		$stock_sp_result=mysqli_query($conn,$stock_sp_query);

	for($q=0;$q<count($arrayadd_stock_num2);$q++){

		if($arrayadd_name2[$q]==''){
			$j=$q-1;
			$stock_info="SELECT * FROM stock INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock_joint.cost_price='$arrayadd_cost2[$q]'";
			//$arrayadd_name2[$q]=$arrayadd_name2[$j];
			//$arrayadd_size2[$q]=$arrayadd_size2[$j];
			}	

			else{
			$stock_info="SELECT * FROM stock INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock.goods_name='$h_stock_name[$q]'";
			}

			$stock_info_result=mysqli_query($conn,$stock_info);
			$stock_num = mysqli_fetch_array($stock_info_result);

			
			

			//$stock_num_join[$q]=$stock_num['stock_num'];
            
			
			$stock_num_join[$q]=$h_stock_joint_num[$q];
			

	}

	$k=0;
	while($k<count($arrayadd_stock_num2)){

		$stock_query="SELECT * FROM stock_joint WHERE stock_num='$stock_num_join[$k]'";
		$stock_info_query=mysqli_query($conn,$stock_query);
		$state_count_c=mysqli_fetch_array($stock_info_query);
		$stock_state_count[$k]=$state_count_c['state_count'];//8   0		0
		$total_stock[$k]=$state_count_c['total_stock'];//10        20		10

		if($k==0){
			$final_count=$stock_state_count[$k]+$arrayadd_ordercount2[$k];//38=8+30
		}

		if($final_count>$total_stock[$k]){//11>10		//하나 더	   38>10	28>20

			if($arrayadd_date2[$k]=='0000-00-00'||$arrayadd_cost2[$k]=='0'){	//제조일자 없음 : 부족한 수량
				$h=$k-1;
				if($h==-1){
					$h=$k;
					$none_stock="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, size, cost_price, price, dc_price, blank, sort, count, state) VALUES ($index_num_sp,0,'$h_stock_name[$h]','$h_stock_size[$h]',0,0,0,'$arrayblank2[$h]','매출','$arrayadd_count2[$k]','재고량 부족')";
					$none_stock_query=mysqli_query($conn,$none_stock);
				}
				else{
				$none_stock="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, size, cost_price, price, dc_price, blank, sort, count, state) VALUES ($index_num_sp,0,'$h_stock_name[$h]','$h_stock_size[$h]',0,0,0,'$arrayblank2[$h]','매출','$arrayadd_count2[$k]','재고량 부족')";
				$none_stock_query=mysqli_query($conn,$none_stock); 
				}

			}
			else{
			$stock_sp_joint_query2="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, date, size, cost_price, price, dc_price, blank, sort, count, state) VALUES ($index_num_sp,'$stock_num_join[$k]','$h_stock_name[$k]','$arrayadd_date2[$k]','$h_stock_size[$k]','$arrayadd_cost2[$k]','$arrayoneprice2[$k]','$arraysaleprice2[$k]','$arrayblank2[$k]','매출','$arrayadd_count2[$k]','출고예정')";
			$stock_sp_joint_result2=mysqli_query($conn,$stock_sp_joint_query2); 


			$stock_joint_query3="UPDATE stock_joint 
									 SET state_count=$total_stock[$k]
									 WHERE stock_num='$stock_num_join[$k]'";
			$stock_joint_result3=mysqli_query($conn,$stock_joint_query3);
			}

			
			
			$final_count=$final_count-$total_stock[$k];// 28=38-10			8=28-20

			$k++;
		}
		if($final_count<=$total_stock[$k]){//11<=20		//충분		//28<=20	//8<=10
			/*stock_sp_joint 등록*/
			$stock_sp_joint_query="INSERT INTO stock_sp_joint (sp_index, stock_index, goods_name, date, size, cost_price, price, dc_price, blank, sort, count, state) VALUES ($index_num_sp,'$stock_num_join[$k]','$h_stock_name[$k]','$arrayadd_date2[$k]','$h_stock_size[$k]','$arrayadd_cost2[$k]','$arrayoneprice2[$k]','$arraysaleprice2[$k]','$arrayblank2[$k]','매출','$arrayadd_count2[$k]','출고예정')";
			$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query); 
			
			for($w=0;$w<$k;$w++){//2
				$sum_arrayadd_count2=$sum_arrayadd_count2+$arrayadd_count2[$w];
			}

			$final_count=$arrayadd_ordercount2[0]-$sum_arrayadd_count2;	//30-(2+20)

			$stock_joint_query2="UPDATE stock_joint
									 SET state_count=$total_stock[$k]
									 WHERE stock_num='$stock_num_join[$k]'";
			$stock_joint_result2=mysqli_query($conn,$stock_joint_query2);

			$k++;
		}
	}

	
 echo "<meta charset='utf-8'><script>alert('매출이 등록 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/information/sale.php');
		</script>";
}
?>