<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tabs | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />


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
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">패키지</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">내포장 상품</a></li>
                                <li role="presentation"><a href="#messages" data-toggle="tab">배송용품</a></li>
                                <li role="presentation"><a href="#settings" data-toggle="tab">기타 상품</a></li>
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
													WHERE A.sort='패키지'";
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
                                <div role="tabpanel" class="tab-pane fade" id="profile">

                                    <p>
                                        <?
									   //stock 테이블
									  $barcode_query2="SELECT A.index_num, A.sort, A.goods_name, B.barcode_num
													FROM stock A
													INNER JOIN stock_joint B
													ON A.index_num = B.index_num
													WHERE A.sort='내포장 상품'";
									  $barcode_result2=mysqli_query($conn,$barcode_query2);
									  $barcode_result6=mysqli_query($conn,$barcode_query2);

									  $num2 = mysqli_fetch_array($barcode_result6);

									  ?>
									  
									  <?
									  if($num2['index_num']!=""){
									  while($barcode_data2=mysqli_fetch_array($barcode_result2)){
                                            
										
									  ?>
									  
									  <button class="col-sm-4 btn btn-default waves-effect"  onclick="code_zum(<?=$barcode_data2["barcode_num"]?>,'<?=$barcode_data2["goods_name"]?>')">
									  <div style=" "><strong><?=$barcode_data2["goods_name"]?></strong>
										<div>
										  <span>
										  <svg class="barcode"
										  jsbarcode-format="EAN13"
										  jsbarcode-value="<?=$barcode_data2["barcode_num"]?>"
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
                                <div role="tabpanel" class="tab-pane fade" id="messages">

                                    <p>
                                         <?
									   //stock 테이블
									  $barcode_query3="SELECT A.index_num, A.sort, A.goods_name, B.barcode_num
													FROM stock A
													INNER JOIN stock_joint B
													ON A.index_num = B.index_num
													WHERE A.sort='배송용품'";
									  $barcode_result3=mysqli_query($conn,$barcode_query3);
									  $barcode_result7=mysqli_query($conn,$barcode_query3);

									  $num3 = mysqli_fetch_array($barcode_result7);

									  

									  
     
									  ?>
									  
									  <?
									  if($num3['index_num']!=""){
									  while($barcode_data3=mysqli_fetch_array($barcode_result3)){
                                            
										
									  ?>
									  
									  <button class="col-sm-4 btn btn-default waves-effect"  onclick="code_zum(<?=$barcode_data3["barcode_num"]?>,'<?=$barcode_data3["goods_name"]?>')">
									  <div style=" "><strong><?=$barcode_data3["goods_name"]?></strong>
										<div>
										  <span>
										  <svg class="barcode"
										  jsbarcode-format="EAN13"
										  jsbarcode-value="<?=$barcode_data3["barcode_num"]?>"
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
                                <div role="tabpanel" class="tab-pane fade" id="settings">

                                    <p>
                                        <?
									   //stock 테이블
									  $barcode_query4="SELECT A.index_num, A.sort, A.goods_name, B.barcode_num
													FROM stock A
													INNER JOIN stock_joint B
													ON A.index_num = B.index_num
													WHERE A.sort='기타 상품'";
									  $barcode_result4=mysqli_query($conn,$barcode_query4);
									   $barcode_result8=mysqli_query($conn,$barcode_query4);

									  $num4 = mysqli_fetch_array($barcode_result8);

									  

									  
     
									  ?>
									  
									  <?
									  if($num4['index_num']!=""){
									  while($barcode_data4=mysqli_fetch_array($barcode_result4)){
                                            
										
									  ?>
									  
									  <button class="col-sm-4 btn btn-default waves-effect"  onclick="code_zum(<?=$barcode_data4["barcode_num"]?>,'<?=$barcode_data4["goods_name"]?>')">
									  <div style=" "><strong><?=$barcode_data4["goods_name"]?></strong>
										<div>
										  <span>
										  <svg class="barcode"
										  jsbarcode-format="EAN13"
										  jsbarcode-value="<?=$barcode_data4["barcode_num"]?>"
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

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

	



</body>

</html>