<?
include("../mysql.php");

if($_GET['index_num']){

    $delete_num=$_GET[index_num];
	

	$stock_del_query="DELETE 
	                  FROM stock_composition
					  WHERE no=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);


	    /*stock_joint 삭제*/
		$stock_joint_query="DELETE 
	                  FROM stock_joint
					  WHERE index_num=$delete_num";
		$stock_joint_result=mysqli_query($conn,$stock_joint_query);





		/*stock 테이블 */
		$stock_query2="UPDATE stock
		              SET division='사용 안함'
					  WHERE index_num=$delete_num";
        $stock_result2=mysqli_query($conn,$stock_query2);


	
        echo "<meta charset='utf-8'><script>alert('완제품 BOM이 삭제 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/create/finished_product_bom.php');
		</script>";


}
?>