<?
if($_POST['goods_brand2']){

    $goods_brand=$_POST['goods_brand2'];//브랜드
	$sort=$_POST['sort2'];//구분
	$goods_name=$_POST['goods_name2'];//상품명
	//$goods_count=$_POST['goods_count2'];//수량
	$outline=$_POST['outline2'];//개요
	$goods_size=$_POST['goods_size2'];//중량(g)




	$arraydate2 =$_POST['goods_date2'];//제조일자
	$arraycostprice2 =$_POST['cost_price2'];//제조원가
	$arrayprice2 =$_POST['goods_price2'];//제조단가
	$arraytotal2 =$_POST['goods_total2'];//재고량
	$arrayblank2 =$_POST['goods_blank2'];//비고


	

	include("../mysql.php");

	/*stock 테이블 index_num 맨끝 번호*/
	$stock_info="SELECT index_num
				 FROM stock
				 ORDER BY index_num DESC
				 ";
	$stock_info_result=mysqli_query($conn,$stock_info);
	$stock_num = mysqli_fetch_array($stock_info_result);

	$index_num=$stock_num['index_num']+1;

	
	/*완제품 등록*/
	$stock_query="INSERT INTO stock
	               (index_num,goods_brand,sort,goods_name,outline,goods_size,division)
				   VALUES($index_num,'$goods_brand','$sort','$goods_name','$outline',$goods_size,'사용 안함')";
	$stock_result=mysqli_query($conn,$stock_query);



	//국가번호+sort
	$sort="8802";



	/*stock_joint 테이블 stock_num 맨끝 번호*/
	$stock_joint_info="SELECT stock_num
				 FROM stock_joint
				 ORDER BY stock_num DESC
				 ";
	$stock_joint_info_result=mysqli_query($conn,$stock_joint_info);
	$stock_joint_num = mysqli_fetch_array($stock_joint_info_result);

	$stock_num2=$stock_joint_num['stock_num']+1;

	/*완제품 제조일자별 등록*/
	for($i=0; $i<count($arraydate2);$i++){

		$stock_num2=$stock_num2+$i;

		
		if($stock_num2<10){
			$stock_num2="0$stock_num2";
		}


		$arrayyear[$i]=substr($arraydate2[$i],2, 2);
		$arraymonth[$i]=substr($arraydate2[$i],5, 2);
		$arrayday[$i]=substr($arraydate2[$i],8, 2);


        $arraydate2[$i]="$arrayyear[$i]$arraymonth[$i]$arrayday[$i]";



		//바코드 생성
		$arraybarcode2[$i]="$sort$stock_num2$arraydate2[$i]";


		

		//등록
		$stock_joint_query="INSERT INTO stock_joint
					  (stock_num, index_num, goods_date, goods_price, total_stock, barcode_num, blank,cost_price)
					  VALUE
					  ($stock_num2, $index_num, '$arraydate2[$i]',$arrayprice2[$i], $arraytotal2[$i], '$arraybarcode2[$i]', '$arrayblank2[$i]',$arraycostprice2[$i])";
		$stock_joint_result=mysqli_query($conn,$stock_joint_query);
	}




	echo "<meta charset='utf-8'><script>alert('완제품이 등록 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/finished_product.php');
	</script>";
	

}

?>