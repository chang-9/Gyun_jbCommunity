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
    <div class="login-box">
        <div class="logo">
            <a href="sign_in.php"><b>CTSMS</b></a>
			<small>Find-id</small>
        </div>
        <div class="card" style="background:rgba(255, 255, 255, .15)">
            <div class="body">
				<form name="check_id" action="check_id.php"  method="POST">
                    <div class="msg" style="color:white;">
                        회원정보를 입력해주세요.
                    </div>



                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color:white;">person</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="background-color: rgba(0, 0, 0, 0);" class="form-control" name="name" placeholder="이름을 입력해주세요." required>
                        </div>
                    </div>


					 <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color:white;">local_phone</i>
                        </span>
                        <div class="form-line">
							<input type="phone" style="background-color: rgba(0, 0, 0, 0);" onKeyPress="return numkeyCheck(event)" maxlength="11" class="form-control phone-number-check" id="phone" name="phone" placeholder="ex)01012345678" required>
                        </div>
                    </div>
					






                    <button id="other" class="btn btn-block btn-lg bg-black waves-effect" type="submit" value="확인">Find ID</button>

                    <div class="row m-t-20 m-b--5 align-center">
                         <a href="sign_in.php">ID가 이미 있으신가요?</a>
                    </div>
                </form>




       <script>  
         /*숫자만 입력*/
function numkeyCheck(e) {
	var keyValue = event.keyCode;
	if( ((keyValue >= 48) && (keyValue <= 57)) )
	return true;
	else return false;
	}



	
			</script>














            </div>
        </div>
    </div>

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