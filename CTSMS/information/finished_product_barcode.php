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

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />	

	<!-- Sweet Alert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<!-- Bootstrap Responsive Table Css -->
    <link href="../css/responsivetable.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

	<link href="../css/productinput.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

	<!-- Modal Css-->
    <link href="../css/modal.css" rel="stylesheet" />

	
	<!-- barcode Css-->
	<link href="../css/barcode.css" rel="stylesheet">

	

    <!-- JsBarcode Js -->
	<script type="text/javascript" src="../js/JsBarcode.ean-upc.min.js"></script>

	

	<style>
	.btn:not(.btn-link):not(.btn-circle) {
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.16), 0 1px 1px rgba(0, 0, 0, 0.12);
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px;
    border: none;
    font-size: 13px;
    outline: none;
    }
	</style>

 



</head>



<body>



<?include("../mysql.php");?>







            <!-- core -->
            <div class="menu" style="display:none;">
                <div class="list">
                    <li class="active" style="display:none;">
                    </li>
                </div>
            </div>
            <!-- # core -->
       
                <!---->
                 
                                    <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">완제품</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">

                                    <p>
                                         <?
									   //stock 테이블
									  $barcode_query="SELECT A.index_num, A.sort, A.goods_name, B.barcode_num
													FROM stock A
													INNER JOIN stock_joint B
													ON A.index_num = B.index_num
													WHERE A.sort='완제품'";
									  $barcode_result=mysqli_query($conn,$barcode_query);
									  $barcode_result5=mysqli_query($conn,$barcode_query);

									  $num = mysqli_fetch_array($barcode_result5);

									  ?>
									  
									  <?
									  if($num['index_num']!=""){
									  while($barcode_data=mysqli_fetch_array($barcode_result)){
                                            
										
									  ?>
									  
									  <button class="col-sm-4 btn btn-default waves-effect" onclick="code_zum(<?=$barcode_data["barcode_num"]?>,'<?=$barcode_data["goods_name"]?>')">
									  <div style=" "><strong><?=$barcode_data["goods_name"]?></strong>
										<div>
										  <span>
										  <svg class="barcode"
										  jsbarcode-format="EAN13"
										  jsbarcode-value="<?=$barcode_data["barcode_num"]?>"
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
									  </button>
									  <?
									  }
									  }else{
									   
                                       echo "데이터가 존재하지 않습니다.";
									  } 
									  ?>
                                    </p>
                                </div>
                                
                            </div>


                                    <div class="modal-footer" style=""> 
									
									</div>
							

							
                        </div>

						
						
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
									<div class="footer" style=""> 
									<center>					
									<button type="button" onclick="printIt()" class="btn btn-primary m-t-15 waves-effect">인쇄</button>
									</center>
									</div>
							
                               
								
				<!---->





				<!--content-->

           

					
				
                <!--END content-->



				





<script>
function printIt(){
	window.print();
}
</script>

<script>
function code_zum(barcode_num,goods_name){
	window.open("http://ccit.cafe24.com/CTSMS/information/code_zum.php?barcode_num="+barcode_num+"&goods_name="+goods_name,'zum', 'fullscreen=no , status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=300,directories=no,location=no');
}
</script>
                               
								
                                 





  <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js 
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Jquery Validation Plugin Css -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

	
    <!-- JQuery Steps Plugin Js -->
    <script src="../plugins/jquery-steps/jquery.steps.js"></script>

	<!-- Sweet Alert Plugin Js -->
	<script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<!-- Moment Plugin Js -->
   <script src="../plugins/momentjs/moment.js"></script>

	<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>


    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
	<script src="../js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

	<!-- Modal Js -->
    <script src="../js/modal.js"></script>

	



</body>

</html>