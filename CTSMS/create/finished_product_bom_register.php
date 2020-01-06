
<?
include("../mysql.php");

if($_POST['goods_name2']){

	$goods_name=$_POST['goods_name2'];//상품명
	$goods_index_num=$_POST['goods_index_num2'];//완제품 index_num


	$arraystock_num2 =$_POST['add_stock_num2'];//원재료 stock_num
	$arraybrand2 =$_POST['add_brand2'];//브랜드
	$arraysort2 =$_POST['add_sort2'];//구분
	$arrayname2 =$_POST['add_name2'];//상품명
	$arraysize2 =$_POST['add_size2'];//중량(g)
	$arraycount2 =$_POST['add_count2'];//소요량

    



    /*stock_composition 테이블 index_num 맨끝 번호*/
	$stock_composition_info="SELECT index_num
				 FROM stock_composition
				 ORDER BY index_num DESC
				 ";
	$stock_composition_info_result=mysqli_query($conn,$stock_composition_info);
	$stock_composition_num = mysqli_fetch_array($stock_composition_info_result);

	$index_num=$stock_composition_num['index_num']+1;





    //$arrayprice=$arrayprice2[0];

	/*완제품 구성 원재료 등록*/
	for($i=0; $i<count($arraystock_num2);$i++){

		$index_num=$index_num+$i;

		/*stock_composition 등록*/
		$stock_composition_query="INSERT INTO stock_composition
					  (index_num, no, goods_brand, sort, goods_name, goods_size, goods_count )
					  VALUES
					  ($index_num,$goods_index_num,'$arraybrand2[$i]','$arraysort2[$i]','$arrayname2[$i]','$arraysize2[$i]',$arraycount2[$i])";
		$stock_composition_result=mysqli_query($conn,$stock_composition_query);

	}/*END 완제품 구성 원재료 등록*/


		/*stock 테이블 */
		$stock_query2="UPDATE stock
		              SET division='사용'
					  WHERE index_num=$goods_index_num";
        $stock_result2=mysqli_query($conn,$stock_query2);
	
        echo "<meta charset='utf-8'><script>alert('완제품 BOM이 등록 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/create/finished_product_bom.php');
		</script>";


	

}
?>