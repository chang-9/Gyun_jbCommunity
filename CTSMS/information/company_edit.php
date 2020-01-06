<?
include("../mysql.php");

if($_POST['business_num']){//거래처 수정
    
    
    $index_num=$_POST['hidden_index'];//index_num

    $business_num=$_POST['business_num'];//사업자 번호
	$client_type=$_POST['client_type'];//거래처 구분
	$company_name=$_POST['company_name'];//거래처명
	$representative=$_POST['representative'];//대표자명
	$sale_type=$_POST['sale_type'];//판매유형
	$item=$_POST['item'];//물품류
	$tel=$_POST['tel'];//전화번호
	$fax_num=$_POST['fax_num'];//팩스번호
	$address=$_POST['address'];//주소
	$e_mail=$_POST['e_mail'];//이메일

	


	
	/*거래처 수정*/
	$client_query="UPDATE client
	               SET business_num='$business_num', client_type='$client_type', company_name='$company_name', representative='$representative',sale_type='$sale_type',item='$item',tel='$tel',fax_num='$fax_num',address='$address', e_mail='$e_mail'
				   WHERE index_num = $index_num";
	$client_result=mysqli_query($conn,$client_query);



	echo "<meta charset='utf-8'><script>alert('거래처가 수정 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/company.php');
	</script>";


	
//END 거래처수정
}else{//거래처 사용 수정

	$index_num=$_GET['index_num'];


	/*client 중단,허용 여부 확인*/
	$client_info="SELECT division
				 FROM client
				 WHERE index_num=$index_num
				 ";
	$client_info_result=mysqli_query($conn,$client_info);
	$client_division = mysqli_fetch_array($client_info_result);



	if($client_division['division']=="사용"){//거래처 사용 중단할 경우



   /*거래처 사용중단*/
	$client_query="UPDATE client
	               SET 	division='사용 안함'
				   WHERE index_num = $index_num";
	$client_result=mysqli_query($conn,$client_query);
    

	echo "<meta charset='utf-8'><script>alert('거래처가 사용 중단 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/company.php');
	</script>";



    //END 거래처 사용 중단할 경우
	}else{//거래처 사용 허용할 경우




    /*거래처 사용중단*/
	$client_query="UPDATE client
	               SET 	division='사용'
				   WHERE index_num = $index_num";
	$client_result=mysqli_query($conn,$client_query);
    

	echo "<meta charset='utf-8'><script>alert('거래처가 사용 허용 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/company.php');
	</script>";


    //END 거래처 사용 허용할 경우
	}

//END 거래처 사용 수정
}

?>