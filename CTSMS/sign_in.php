<!DOCTYPE html>
<html style="">

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
<?
include("password_update.php");
?>

<body class="login-page" >

    <div class="login-box">
        <div class="logo">
            <a href="sign_in.php"><b>CTSMS</b></a>
			<small>Login</small>
        </div>
        <div class="card" style="background:rgba(255, 255, 255, .15)">
            <div class="body" >
                <form action="http://ccit.cafe24.com/CTSMS/sign_in_process.php" method="POST">
                    <div class="msg" style="color:white;">아이디와 패스워드를 입력해주세요.</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color: white;">person</i>
                        </span>
                        <div class="form-line">
                            <input style="background-color: rgba(0, 0, 0, 0);" type="text" class="form-control" name="id" id="id" placeholder="Username" required autofocus/>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color: white;">lock</i>
                        </span>
                        <div class="form-line">
                            <input style="background-color: rgba(0, 0, 0, 0);" type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-black waves-effect" type="submit" name="submit_update_board" value="LOGIN" id="enter"/>SIGN IN</button>
                        </div>
                    </div>
					<div class="row m-t-15 m-b--20 align-center" style="margin-bottom: 5px;">
                            <a href="sign_up.php" style="color:white;">회원가입</a>
                        </div>
                    <div class="row m-t-15 m-b--20 align-center" style="margin-bottom: 5px;">
                            <a href="find_id.php" style="color:white;">아이디 찾기</a> <b style="color:white;">or<b>
							<a href="find_password.php" style="color:white;">비밀번호 찾기</a>
                    </div>
                </form>
            </div>
        </div>
		<div class="logo">
		
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
	<script src="./js/pages/examples/sign-in.js"></script>
</body>

</html>