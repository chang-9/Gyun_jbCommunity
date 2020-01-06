<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta content="blendTrans(Duration=0.0)" http-equiv="Page-Enter" />
	<meta content="blendTrans(Duration=0.0)" http-equiv="Page-Exit" />
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

	 $id=$_POST['id'];

	 $name=$_POST['name'];
	 $phone=$_POST['phone'];

	 //회원 정보 테이블
      $mem_info="SELECT * FROM membership WHERE name='$name' and phone= '$phone' and id='$id' ";
      $mem_info_result=mysqli_query($conn,$mem_info);
	  $mem_data=mysqli_fetch_array($mem_info_result);
      $mem_id=$mem_data['id'];

	  if($mem_id==""){


		  echo "<script>
		        alert('회원 정보와 일치하는 정보가 존재하지 않습니다.');

               window.location.replace('http://ccit.cafe24.com/CTSMS/find_password.php');

                </script>";

	  }else{
	  echo "
	  
	<body class='login-page' >
    <div class='login-box'>
        <div class='logo'>
            <a href='sign_in.php'><b>CTSMS</b></a>
			<small>Find-Password</small>
        </div>
        <div class='card' style='background:rgba(255, 255, 255, .15)'>
            <div class='body'>
					<form name='frm' action='sign_in.php' method='post'  onsubmit='return check_form()'>
                    <div class='msg' style='color:white;'>
                        비밀번호를 재설정 합니다.
                    </div>



                    <div class='input-group'>
                        <span class='input-group-addon'>
                            <i class='material-icons' style='color:white;'>person</i>
                        </span>
                        <div class='form-line'>
                            <input style='text-align: center; background-color: rgba(0, 0, 0, 0);'  type='text' class='form-control' id='id' name='id' value='".$mem_id."' readonly>
                        </div>
                    </div>


					<div class='input-group'>
                        <span class='input-group-addon'>
                            <i class='material-icons' style='color:white;'>lock</i>
                        </span>
                        <div class='form-line'>
                            <input type='password' style='background-color: rgba(0, 0, 0, 0);'  class='form-control' id='password1' minlength='6' name='password1' placeholder='비밀번호 재설정'>
                        </div>
                    </div>



					<div class='input-group'>
                        <span class='input-group-addon'>
                            <i class='material-icons' style='color:white;'>lock_open</i>
                        </span>
                        <div class='form-line'>
                            <input type='password' style='background-color: rgba(0, 0, 0, 0);'  class='form-control' id='password2' minlength='6' name='password2' placeholder='비밀번호 확인' >
                        </div>
                    </div>


					<div>
					<p id='check' style='margin-bottom: 30px;text-align: center;font-weight: bold;color: red;'></p>
					</div>



				

					<button class='btn btn-block btn-lg bg-black waves-effect' type='submit'>비밀번호 변경</button>
								


            </div>
        </div>
    </div>
	</form>

</body>


	  
	  
	  
	  ";
	  }
      
	 ?>






	 <script>
	/*유효성 검사*/

function check_form(){



if(document.frm.password1.value=="") {


	 document.getElementById('check').innerHTML = '비밀번호 재설정란을 입력해 주세요.';

return false;
 }


 if(document.frm.password2.value=="") {


	 document.getElementById('check').innerHTML = '비밀번호 확인란을 입력해 주세요.';
return false;
 }
 
 if(document.frm.password1.value==document.frm.password2.value) {

 alert("비밀번호가 변경되었습니다.");

	
return true;
 }else{

	  document.getElementById('check').innerHTML = '비밀번호가 일치하지 않습니다.';
	  return false;
 }





return true;

}
</script>

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