<?
include("../mysql.php");

if($_POST['hidden_index']){
	 
	 $hidden_index=$_POST['hidden_index'];
	 


	for($i=0; $i<count($_POST['bank']); $i++){

		$bank[$i]=$_POST['bank'][$i];//은행
		$account[$i]=$_POST['account'][$i];//계좌
		$account_name[$i]=$_POST['account_name'][$i];//예금주
		$blank[$i]=$_POST['blank'][$i];//비고


		/*stock_account 등록*/
		$stock_account_query="INSERT INTO stock_account
					  (company_index, bank,  account, account_name, blank)
					  VALUES
					  ($hidden_index,'$bank[$i]','$account[$i]','$account_name[$i]','$blank[$i]')";
		$stock_account_result=mysqli_query($conn,$stock_account_query);


	}

	for($j=0; $j<count($_POST['account_index_num']); $j++){


        $account_index_num[$j]=$_POST['account_index_num'][$j];//index_num
		$account_bank[$j]=$_POST['account_bank'][$j];//은행
		$account_account[$j]=$_POST['account_account'][$j];//계좌
		$account_name2[$j]=$_POST['account_name2'][$j];//예금주
		$account_blank[$j]=$_POST['account_blank'][$j];//비고

		/*stock_account 수정*/
			$query="UPDATE stock_account
					SET 
                    bank='$account_bank[$j]', account='$account_account[$j]', account_name='$account_name2[$j]', blank='$account_blank[$j]'    
					WHERE index_num=$account_index_num[$j]";
			$result=mysqli_query($conn,$query);


	}



	 echo "<meta charset='utf-8'><script>alert('계좌 정보가 등록 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/information/account.php');
		</script>";
}


?>