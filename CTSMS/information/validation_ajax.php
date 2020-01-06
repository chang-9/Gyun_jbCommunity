<?
include("../mysql.php");



if($_POST['business_num2']){

	$business_num=$_POST['business_num2'];

if($business_num!="no"){
		
	/*client 테이블*/
$client_query="SELECT *
              FROM client
              WHERE business_num='$business_num' ";
$client_result=mysqli_query($conn,$client_query);

$client_cnt = mysqli_num_rows($client_result);
		if($client_cnt==0) {
			
			echo "<span style='color:blue;'>등록 가능한 사업자 번호입니다.
			     <input type='hidden' id='hidden_validate2' value='가능'>			     
			      ";
		}else{
			echo "이미 등록된 사업자 번호입니다.
			      <input type='hidden' id='hidden_validate2'  value='불가능'>
			      ";
		}

		
}else{
	echo "형식에 맞춰 작성해주세요.
			      <input type='hidden' id='hidden_validate2'  value='불가능'>
			      ";
}

}






?>