<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CTSMS</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="./plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="./plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="./plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="./css/style.css" rel="stylesheet">

	<style>
	.form-control{
	color:#fff;
	}
	</style>
</head>

<body class="login-page" >
    <?
	 include("mysql.php");

	 $name=$_POST['name'];
	 $phone=$_POST['phone'];

	 //회원 정보 테이블
      $mem_info="SELECT * FROM membership WHERE name='$name' and phone= '$phone' ";
      $mem_info_result=mysqli_query($conn,$mem_info);
	  $mem_data=mysqli_fetch_array($mem_info_result);
      $mem_id=$mem_data['id'];

	  if($mem_id==""){


		  echo "<script>
		        alert('회원 정보와 일치하는 아이디가 존재하지 않습니다.');

               window.location.replace('http://ccit.cafe24.com/CTSMS/find_id.php');

                </script>";

	  }else{
	  echo "
	  
	<body class='login-page' >
    <div class='login-box'>
        <div class='logo'>
            <a href='index.php'><b>CTSMS</b></a>
			<small>Find-id</small>
        </div>
        <div class='card' style='background:rgba(255, 255, 255, .15)'>
            <div class='body'>

                    <div class='msg' style='color:white;'>
                        입력하신 정보와 일치하는 아이디 정보입니다.
                    </div>



                    <div class='input-group'>
                        <span class='input-group-addon'>
                            <i class='material-icons' style='color:white;'>person</i>
                        </span>
                        <div class='form-line'>
                            <input style='text-align: center;' type='text' class='form-control' id='id' name='id' value='".$mem_id."' readonly>
                        </div>
                    </div>

					


				<div id='altActionButtonWrap' class='wrap_btn' style='overflow: hidden;width: 100%;text-align: center;'>
								<a href='http://ccit.cafe24.com/CTSMS/sign_in.php' style='display: inline-block;width: 40%;padding-top: 9px;margin: 0 1px;' class='btn btn-block btn-lg bg-black waves-effect allign-left'>로그인 하기</a>
								<a href='http://ccit.cafe24.com/CTSMS/find_password.php' style='display: inline-block;width: 40%;padding-top: 9px;margin: 0 1px;' class='btn btn-block btn-lg bg-black waves-effect allign-left'>비밀번호 찾기</a>
				</div>

            </div>
        </div>
    </div>

</body>


	  
	  
	  
	  ";
	  }
      
	 ?>

    <!-- Jquery Core Js -->
    <script src="./plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="./plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="./plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="./plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="./js/admin.js"></script>
    <script src="./js/pages/examples/sign-in.js"></script>
	<!-- 정규식 -->
	<script src="./js/regexp.js"></script> 
</body>

</html>