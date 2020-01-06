
<?

include("mysql.php");


if($_POST['sign_up_id']){



		$sign_up_name=$_POST['name'];//이름
		$sign_up_phone=$_POST['phone'];//폰번호
		$sign_up_id=$_POST['sign_up_id'];//아이디
		$sign_up_password=$_POST['password'];//비밀번호

		
		
			
		/*membership 테이블 index_num 맨끝 번호*/
							$membership_info="SELECT index_num
										 FROM membership
										 ORDER BY index_num DESC
										 ";
							$membership_result2=mysqli_query($conn,$membership_info);
							$membership_num = mysqli_fetch_array($membership_result2);

							$membership_index_num=$membership_num['index_num']+1;


							





		 /*membership 등록 */
		$membership_query="INSERT INTO membership
					  (index_num, id, password, name, phone)
					  VALUE
					  ($membership_index_num, '$sign_up_id', '$sign_up_password', '$sign_up_name', '$sign_up_phone')";
		$membership_result=mysqli_query($conn,$membership_query);

		
		
		



		echo "<meta charset='utf-8'><script>alert('회원가입이 완료 되었습니다.');
		window.location.replace('http://ccit.cafe24.com/CTSMS/sign_in.php');
		</script>";


}

 ?>
