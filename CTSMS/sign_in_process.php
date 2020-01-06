<?php
	session_start(); //세션 시작

	if($_POST["id"]==NULL) {
		echo "<meta charset='utf-8'><script>alert('아이디를 입력해주세요');window.location = 'http://ccit.cafe24.com/CTSMS/sign_in.php';</script>";
	}
	else if($_POST["password"]==NULL) {
		echo "<meta charset='utf-8'><script>alert('비밀번호를 입력해주세요'); window.location = 'http://ccit.cafe24.com/CTSMS/sign_in.php';</script>";
	}
	else {
		include("mysql.php");


		$id = $_POST["id"];
		$pass = $_POST["password"];

		$sql_login = "SELECT * FROM membership WHERE id = '$id' and password = '$pass'";
		$result = mysqli_query($conn, $sql_login);
		$data = mysqli_fetch_array($result);
		

		$row_cnt = mysqli_num_rows($result);
		if($row_cnt==0) {
			//echo $id."/".$pass;
			echo "<meta charset='utf-8'><script>alert('아이디와 비밀번호를 다시 한 번 확인해주세요'); window.location = 'http://ccit.cafe24.com/CTSMS/sign_in.php';</script>";
		}
		else {
			$_SESSION["id"] = $id;
			$_SESSION["pass"] = $pass;
			$_SESSION["name"] = $data['name'];
			$_SESSION["login_state"]="true";
			echo "<meta charset='utf-8'><script>window.location = 'http://ccit.cafe24.com/CTSMS/index.php';</script>";
		}

	}
?>
