<!DOCTYPE html>
<html>

<hed>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
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
    <link href="./plugins/animate-css/aimate.css" rel="stylesheet" />

	<!-- Morris Css -->
    <link href="./plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="./css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="./css/themes/all-themes.css" rel="stylesheet" />


	<!--디자인-->
	<style>
	.theme-red{
	background:url(http://ccit.cafe24.com/CTSMS/images/detail2.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-color: rgba(0, 0, 0, 0.4);
	}

	.card{
    background: rgba(255, 255, 255, 0.82);
	}

	.list_group_item{

	background-color: rgba(255, 255, 255, 0.79);
	background-color: rgba(255, 255, 255, 0.79);
	}
	</style>
	


</head>

<body class="theme-red">

<?include("header.php");?>
<?include("mysql.php");?>








<section class="content">
        <div class="container-fluid">



            <div class="row clearfix">

			<!-- 최근 입고 현황-->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>최근 입고 현황<b></h2>
                        </div>
                        <div class="body">
						<?
						/*stock 테이블*/
						$stockio_query="SELECT *
									  FROM stock_inout 
									  WHERE sort like '입고' 
									  ORDER BY index_num DESC LIMIT 6";
						$stockio_result=mysqli_query($conn,$stockio_query);
						$i=0;
						?>
                            <div class="list-group">
							        <?
									while($stockio_data=mysqli_fetch_array($stockio_result)){
										$inout_num=$stockio_data['inout_num'];

                                      $stockio_query2="SELECT *
									  FROM stock_inout_joint 
									  WHERE inout_num='$inout_num' 
									  ORDER BY index_num ASC ";
									  $stockio_result2=mysqli_query($conn,$stockio_query2);
									  $stockio_data2=mysqli_fetch_array($stockio_result2);

									  $stockio_query3="SELECT *
									  FROM stock_inout_joint 
									  WHERE inout_num='$inout_num' 
									  ORDER BY index_num ASC ";
									  $stockio_result3=mysqli_query($conn,$stockio_query3);
									  $stockio_data3=mysqli_num_rows($stockio_result3);
									  $stockio_data3=$stockio_data3-1;


										
									?>
                                <a class="list-group-item">
                                    <b style="color:#92cbd2;"><?=$stockio_data2['product_name'];?></b> <?if($stockio_data3>=1){?> 외  <?=$stockio_data3;?>개 <?}else{?><?}?><small style=" color: #949494;float:right; font-size: 2%; margin-left: 4px; margin-right: 3px;margin-top: 3px;"><i class="material-icons" style=" font-size: 1%; margin-right: 2px;">access_time</i><?=$stockio_data['date'];?></small><?if($i==0){?><span class="badge bg-green">New</span><?}?>
                                </a>
								<?
								$i++;
						         }
								?>
								
                            </div>
                        </div>
						<div class="footer" style="padding-left: 90%; padding-bottom: 3px;">
						<a style="color: black; font-size: 2px;" href="http://ccit.cafe24.com/CTSMS/productinput/warehousing.php">+더보기</a>
						</div>
                    </div>
                </div>
                <!-- 최근 입고 현황 END -->

                   
	    
               

                    <!-- 최근 출고 현황 -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>최근 출고현황<b></h2>
                      </div>
                        <div class="body">
						<?
						/*stock 테이블*/
						$stockio_query="SELECT *
									  FROM stock_inout 
									  WHERE sort like '출고' 
									  ORDER BY index_num DESC LIMIT 6";
						$stockio_result=mysqli_query($conn,$stockio_query);
						$i=0;
						?>
                            <div class="list-group">
							        <?
									while($stockio_data=mysqli_fetch_array($stockio_result)){
										$inout_num=$stockio_data['inout_num'];

                                      $stockio_query2="SELECT *
									  FROM stock_inout_joint 
									  WHERE inout_num='$inout_num' 
									  ORDER BY index_num ASC ";
									  $stockio_result2=mysqli_query($conn,$stockio_query2);
									  $stockio_data2=mysqli_fetch_array($stockio_result2);

									  $stockio_query3="SELECT *
									  FROM stock_inout_joint 
									  WHERE inout_num='$inout_num' 
									  ORDER BY index_num ASC ";
									  $stockio_result3=mysqli_query($conn,$stockio_query3);
									  $stockio_data3=mysqli_num_rows($stockio_result3);
									  $stockio_data3=$stockio_data3-1;


										
									?>
                                <a class="list-group-item">
                                    <b style="color:#e094ae;"><?=$stockio_data2['product_name'];?></b> <?if($stockio_data3>=1){?> 외  <?=$stockio_data3;?>개 <?}else{?><?}?><small style=" color: #949494;float:right; font-size: 2%; margin-left: 4px; margin-right: 3px;margin-top: 3px;"><i class="material-icons" style=" font-size: 1%; margin-right: 2px;">access_time</i><?=$stockio_data['date'];?></small><?if($i==0){?><span class="badge bg-red">New</span><?}?>
                                </a>
								<?
								$i++;
						         }
								?>
								
                            </div>
                        </div>
						<div class="footer" style="padding-left: 90%; padding-bottom: 3px;">
						<a style="color: black; font-size: 2px;" href="http://ccit.cafe24.com/CTSMS/productinput/release.php">+더보기</a>
						</div>
                    </div>
                </div>
                <!-- 최근 출고 현황 END -->

            </div>
			<div class="row clearfix">

			<!-- 일별 입출고 현황 Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>월별 입출고 현황<b></h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# 일별 입출고 현황 Line Chart -->


                    <!-- Donut Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>품목 종류 수<b></h2>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="graph"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Donut Chart -->

            </div>
        </div>
    </section>



	  <!-- Jquery Core Js -->
    <script src="./plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="./plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="./plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="./plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="./plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="./plugins/jquery-countto/jquery.countTo.js"></script>

	<!-- Morris Plugin Js -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="./plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="./plugins/flot-charts/jquery.flot.js"></script>
    <script src="./plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="./plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="./plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="./plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="./plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="./js/admin.js"></script>
	<script src="./js/pages/charts/chartjs.js"></script>
	<script src="./js/pages/charts/morris.js"></script>
	
	
 
	

    <!-- Demo Js -->
    <script src="./js/demo.js"></script>


                        




						   <?
						$today=date('Y-m-d');
						$today=substr($today,0, 4);

						for($m=1; $m<13; $m++){
							$mm=$m;
							if($m<10){
								$m="0$m";
							}
						$date="$today-$m";
						


						/*stock 테이블*/
						$stockmo_query="SELECT *
									  FROM stock_inout 
									  WHERE date LIKE '%$date%' AND sort='입고'
									  ";
						$stockmo_result=mysqli_query($conn,$stockmo_query);
						$stockmo_data=mysqli_num_rows($stockmo_result);
						
						?>


						<input type="hidden" id="in_m<?=$mm?>" value="<?=$stockmo_data?>">


                        <?
						/*stock 테이블*/
						$stockmo_query2="SELECT *
									  FROM stock_inout 
									  WHERE date LIKE '%$date%' AND sort='출고'
									  ";
						$stockmo_result2=mysqli_query($conn,$stockmo_query2);
						$stockmo_data2=mysqli_num_rows($stockmo_result2);
						
                       ?>
						<input type="hidden" id="out_m<?=$mm?>" value="<?=$stockmo_data2?>">

						<?

						}
						
						?>
	                

                                      <?
									  $stockio_query4="SELECT *
									  FROM stock 
									  WHERE sort='패키지' AND division='사용'
									  ";
									  $stockio_result4=mysqli_query($conn,$stockio_query4);
									  $stockio_data4=mysqli_num_rows($stockio_result4);
									  ?>
									  <input type="hidden" id="donut_num1" value="<?=$stockio_data4?>">

									   <?
									  $stockio_query5="SELECT *
									  FROM stock 
									  WHERE sort='내포장 상품' AND division='사용'
									  ";
									  $stockio_result5=mysqli_query($conn,$stockio_query5);
									  $stockio_data5=mysqli_num_rows($stockio_result5);
									  ?>
									  <input type="hidden" id="donut_num2" value="<?=$stockio_data5?>">

									   <?
									  $stockio_query6="SELECT *
									  FROM stock 
									  WHERE sort='완제품' AND division='사용'
									  ";
									  $stockio_result6=mysqli_query($conn,$stockio_query6);
									  $stockio_data6=mysqli_num_rows($stockio_result6);
									  ?>
									  <input type="hidden" id="donut_num3" value="<?=$stockio_data6?>">
									  
                                      
<script>
$(function () {

		
		var in_m1=document.getElementById("in_m1").value;
		var in_m2=document.getElementById("in_m2").value;
		var in_m3=document.getElementById("in_m3").value;
		var in_m4=document.getElementById("in_m4").value;
		var in_m5=document.getElementById("in_m5").value;
		var in_m6=document.getElementById("in_m6").value;
		var in_m7=document.getElementById("in_m7").value;
		var in_m8=document.getElementById("in_m8").value;
		var in_m9=document.getElementById("in_m9").value;
		var in_m10=document.getElementById("in_m10").value;
		var in_m11=document.getElementById("in_m11").value;
		var in_m12=document.getElementById("in_m12").value;


		var out_m1=document.getElementById("out_m1").value;
		var out_m2=document.getElementById("out_m2").value;
		var out_m3=document.getElementById("out_m3").value;
		var out_m4=document.getElementById("out_m4").value;
		var out_m5=document.getElementById("out_m5").value;
		var out_m6=document.getElementById("out_m6").value;
		var out_m7=document.getElementById("out_m7").value;
		var out_m8=document.getElementById("out_m8").value;
		var out_m9=document.getElementById("out_m9").value;
		var out_m10=document.getElementById("out_m10").value;
		var out_m11=document.getElementById("out_m11").value;
		var out_m12=document.getElementById("out_m12").value;





	 new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line',in_m1, in_m2, in_m3, in_m4, in_m5, in_m6, in_m7, in_m8, in_m9, in_m10, in_m11, in_m12,out_m1, out_m2, out_m3, out_m4, out_m5, out_m6, out_m7, out_m8, out_m9, out_m10, out_m11, out_m12));

   /*donut*/
	var num1=document.getElementById("donut_num1").value;
	var num2=document.getElementById("donut_num2").value;
	var num3=document.getElementById("donut_num3").value;
	//getMorris('donut', 'donut_chart');
   // getMorris('line', 'line_chart');
   // getMorris('bar', 'bar_chart');
   // getMorris('area', 'area_chart');
	getMorris('donut', 'donut_chart','패키지',num1,'내포장상품',num2,'완제품',num3);
});
</script>

</body>

</html>