<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CTSMS</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">	

	<!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">


	

    <!-- JsBarcode Js -->
	<script type="text/javascript" src="../js/JsBarcode.ean-upc.min.js"></script>

	

	

 



</head>



<body>



<?include("../mysql.php");?>


			  
									  
									  <div style="text-align: center; padding-top: 10px;">
									  
									  <strong><?=$_GET['goods_name']?></strong>
										<div>
										  <span>
										  <svg class="barcode"
										  jsbarcode-format="EAN13"
										  jsbarcode-value="<?=$_GET['barcode_num']?>"
										  jsbarcode-textmargin="0"
										  jsbarcode-height=50
										  jsbarcode-width=1
										  jsbarcode-fontoptions="bold">
										  </svg>			  
										  <script>
										  JsBarcode(".barcode").init();
										  </script>
										  </span>
										</div>
									  </div>



							<center>					
							<button style="margin-top:50px;" type="button" onclick="printIt()" class="btn btn-primary m-t-15 waves-effect">인쇄</button>
							</center>
									 


<script>
function printIt(){
	window.print();
}
</script>



</body>
</html>