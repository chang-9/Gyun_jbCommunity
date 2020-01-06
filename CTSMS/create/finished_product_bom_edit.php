

<?
include("../mysql.php");

if($_POST['hidden_index']){

	$hidden_index=$_POST['hidden_index'];//완제품 index_num

	$edit_index_num=$_POST['composition_index_num'];//수정 index_num
	$edit_count=$_POST['composition_count'];//수정 소요량
  
	$arraystock_num =$_POST['add_stock_num'];//원재료 stock_num
	$arraybrand =$_POST['add_brand'];//브랜드
	$arraysort =$_POST['add_sort'];//구분
	$arrayname =$_POST['add_name'];//상품명
	$arraysize =$_POST['add_size'];//중량(g)
	//$arraydate =$_POST['add_date'];//제조일자
	//$arrayprice =$_POST['add_price'];//단가(원)
	$arraycount =$_POST['add_count'];//소요량

	

    for($i=0; $i<count($edit_index_num);$i++){
		

        /*stock_composition 수정*/
        $stock_up_query="UPDATE stock_composition
		                 SET goods_count=$edit_count[$i]
						 WHERE index_num=$edit_index_num[$i]
						 ";
        $stock_up_result=mysqli_query($conn,$stock_up_query);


	}



	/*stock_composition 테이블 index_num 맨끝 번호*/
	$stock_composition_info="SELECT index_num
				 FROM stock_composition
				 ORDER BY index_num DESC
				 ";
	$stock_composition_info_result=mysqli_query($conn,$stock_composition_info);
	$stock_composition_num = mysqli_fetch_array($stock_composition_info_result);

	$index_num=$stock_composition_num['index_num']+1;


	 for($j=0; $j<count($arraystock_num);$j++){

		/*echo "원재료 stock_num:$edit_index_num[$j]<br>";
		echo "브랜드:$arraybrand[$j]<br>";
		echo "구분:$arraysort[$j]<br>";
		echo "상품명:$arrayname[$j]<br>";
		echo "중량(g):$arraysize[$j]<br>";
		echo "제조일자:$arraydate[$j]<br>";
		echo "단가(원):$arrayprice[$j]<br>";
		echo "소요량:$arraycount[$j]<br><br>";*/

		$index_num=$index_num+$i;

        /*stock_composition 추가*/
		$stock_composition_query="INSERT INTO stock_composition
					  (index_num, no, goods_brand, sort, goods_name, goods_size, goods_count )
					  VALUE
					  ($index_num,$hidden_index,'$arraybrand[$j]','$arraysort[$j]','$arrayname[$j]','$arraysize[$j]',$arraycount[$j])";
		$stock_composition_result=mysqli_query($conn,$stock_composition_query);

	}





	 echo "<meta charset='utf-8'><script>alert('완제품 BOM이 수정 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/create/finished_product_bom.php');
		</script>";

}

?>