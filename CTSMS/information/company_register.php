<?
if($_POST['representative2']){

    $business_num=$_POST['business_num2'];//사업자 번호
	$client_type=$_POST['client_type2'];//거래처 구분
	$company_name=$_POST['company_name2'];//거래처명
	$representative=$_POST['representative2'];//대표자명
	$sale_type=$_POST['sale_type2'];//판매유형
	$item=$_POST['item2'];//물품류
	$tel=$_POST['tel2'];//전화번호
	$fax_num=$_POST['fax_num2'];//팩스번호
	$address=$_POST['address2'];//주소
	$e_mail=$_POST['e_mail2'];//이메일

	include("../mysql.php");

	/*client 테이블 index_num 맨끝 번호*/
	$client_info="SELECT index_num
				 FROM client
				 ORDER BY index_num DESC
				 ";
	$client_info_result=mysqli_query($conn,$client_info);
	$client_num = mysqli_fetch_array($client_info_result);

	$index_num=$client_num['index_num']+1;

	
	/*거래처 등록*/
	$client_query="INSERT INTO client
	               (index_num,client_type,company_name,business_num,representative,sale_type,item,tel,fax_num,address,e_mail,division)
				   VALUES($index_num,'$client_type','$company_name','$business_num','$representative','$sale_type','$item','$tel','$fax_num','$address','$e_mail','사용')";
	$client_result=mysqli_query($conn,$client_query);



	echo "<meta charset='utf-8'><script>alert('거래처가 등록 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/company.php');
	</script>";
	

}

?>