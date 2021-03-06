﻿<!DOCTYPE html>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="sign_in.php"><b>CTSMS</b></a>
			<small>Sign-up</small>
        </div>

        <div class="card" style="background:rgba(255, 255, 255, .15)">
            <div class="body">
                <form name="frm" action="sign_up_success.php" onsubmit="return check_form();" method="POST">
                    <div class="msg" style="color:white;">회원정보를 입력해 주세요.</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"style="color: white;">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text"  style="background-color: rgba(0, 0, 0, 0);" class="form-control" name="name" placeholder="이름을 입력해주세요." required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color: white;">local_phone</i>
                        </span>
                        <div class="form-line">
							<input type="phone" style="background-color: rgba(0, 0, 0, 0);"  onKeyPress="return numkeyCheck(event)" maxlength="11" class="form-control phone-number-check" id="phone" name="phone" placeholder="ex)01012345678" required>
                        </div>
                    </div>

					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color: white;">face</i>
                        </span>
                        <div class="form-line">
                            <input type="text" style="background-color: rgba(0, 0, 0, 0);"  class="form-control" id="id" name="sign_up_id" placeholder="아이디를 입력해주세요."  required>
                        </div>
                    </div>

					 <div class="form-group">

						<button type="button"  style=" font-size: 12px;" class="btn btn-block btn-lg bg-black waves-effect" onclick="javascript:idchk();" >ID 중복 확인</button>
               
						</div>


                    <div id="id_chk" ></div>
					<input type='hidden' name='hidden_id' id='hidden_id' value='불가능'>

					
					

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color: white;">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password"  style="background-color: rgba(0, 0, 0, 0);" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-black waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign_in.php">ID가 이미 있으신가요?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




	<script>
	function showUser(str)
	 {
	 if (str=="")
	   {
	   document.getElementById("id_chk").innerHTML="";
	   return;
	   }
	 if (window.XMLHttpRequest)  {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	   xmlhttp=new XMLHttpRequest();
	 }
	 else {
	// code for IE6, IE5
	   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

	 }
	 xmlhttp.onreadystatechange=function()  {
	   if (xmlhttp.readyState==4 && xmlhttp.status==200)  {
		 document.getElementById("id_chk").innerHTML=xmlhttp.responseText;
		 }
	   }
	 xmlhttp.open("GET","sign_up_id.php?q="+str,true);
	﻿ xmlhttp.send();
	 }




	</script>

	<script>
	    function check_form(){
			var hidden_id=document.frm.hidden_id.value;

			 if(hidden_id=="불가능"){
				 alert("아이디 중복 확인을 다시 해주세요.");
				  return false;
			}else if(hidden_id=="가능"){

			}
	}
	</script>
	
	<script>
/*숫자만 입력*/
function numkeyCheck(e) {
	var keyValue = event.keyCode;
	if( ((keyValue >= 48) && (keyValue <= 57)) )
	return true;
	else return false;
	}


	/*아이디 중복 확인*/
	function idchk(){
		$("#hidden_id").remove();
		var id=document.getElementById("id").value;
		 showUser(id);
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