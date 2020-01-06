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

	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

	<!-- Wait Me Css -->
    <link href="../plugins/waitme/waitMe.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Bootstrap Responsive Table Css -->
    <link href="../css/responsivetable.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/warehousinglist.css" rel="stylesheet">
	<link href="../css/productinput.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

	<!-- Modal Css-->
    <link href="../css/modal.css" rel="stylesheet" />

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
	.deep{
	background-color: rgba(255, 255, 255, 0.82);
    padding-top: 13px;
	}
	.form-control.input-sm{
	background-color: rgba(255, 255, 255, 0);
	}

	</style>


    <style>
	/*modal 스크롤 가능하게*/
	#Modal {
	  overflow: auto;
	}
	#Modal2 {
	  overflow: auto;
	}
	#Modal3 {
	  overflow: auto;
	}
	#Modal4 {
	  overflow: auto;
	}
	#Modal5 {
	  overflow: auto;
	}
	#Modal6 {
	  overflow: auto;
	}
	</style>
   
</head>



<body class="theme-red">

<?include("../header.php");?>

<?include("../mysql.php");?>


<!--입고 리스트-->


<form id="frm" name="frm"  method="post" action="">
<section class="content">
<div class="deep">
                <div class="tit_bdy1">매출 현황</div>

				<?
				/*stock_sp 테이블*/
				$query="SELECT *
						FROM (SELECT date, SUM(total_price), SUM(return_price) ,sort
						FROM stock_sp
						WHERE sort='매출'
						GROUP BY date  ) A
						LEFT OUTER JOIN (SELECT date as date_collection, SUM(price), sort as sort_collection
						FROM stock_collection
						GROUP BY date) B ON A.date = B.date_collection
						UNION
						SELECT *
						FROM (SELECT date  , SUM(total_price), SUM(return_price) ,sort
						FROM stock_sp
						WHERE sort='매출'
						GROUP BY date ) C
						RIGHT OUTER JOIN (SELECT date as date_collection , SUM(price), sort as sort_collection
						FROM stock_collection
						GROUP BY date   ) D ON C.date = D.date_collection";
				$result=mysqli_query($conn,$query);
				$i=0;
				?>



				

				<div class="container-fluid">
            <div class="block-header" >
                
   



				<div class="row clearfix" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">                      
                        <div class="body">
                            <div class="row clearfix">

			

                                           

								
								<div class="body" >

                            <div class="table-responsive" id="no-more-tables" style="margin-left: 10px; ">

							   <?
							   $year_date=date("Y");
							   $today=date("Y-m-d");
							   ?>


							    <div class="col-sm-6" style="margin-bottom:20px;">
								<strong>기간</strong>
								<input type="date" class="form-control" id="start_date" name="start_date" placeholder="" value="<?=$year_date?>-01-01" onchange="date_change()"> ~
								<input type="date" class="form-control" id="end_date" name="end_date" placeholder="" value="<?=$today?>" onchange="date_change()">
								</div>
							
                              <div class="col-sm-6" style="margin-bottom:20px;">
							  <strong>총 합계</strong>
							  <table class="table  " style=" width=100%; background-color: rgba(255, 255, 255, 0.6);" >
                                    <thead>
									
                                        <tr>
											<th style="text-align: center;">총 매출액</th>
											<th style="text-align: center;">총 반품액</th>
											<th style="text-align: center;">총 수금액</th>
										</tr>
                                    </thead>
                                    <tbody id="price_list">
                                   <!---->
								   
                                        

									<!---->
                                    </tbody>
                                </table>
								</div>

					

                                <div style="margin-bottom:40px;"></div>

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color: rgba(255, 255, 255, 0.6);" >
                                    <thead>
									    <tr >
											<th rowspan="2">일자</th>
											<th colspan="2">매출</th>
											<th colspan="3">수금</th>
										</tr>
                                        <tr>                                           
											<th style="text-align: center;">매출액</th>
											<th style="text-align: center;">반품액</th>
											<th style="text-align: center;">수금액</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <!---->
								   <?
								          while($data=mysqli_fetch_array($result)){
				

											$sp_date[$i]=$data['date'];//일자
											$sp_date_collection[$i]=$data['date_collection'];//일자
											$sp_total_price[$i]=$data['SUM(total_price)'];//매출액
											$sp_return_price[$i]=$data['SUM(return_price)'];//반품액
											$sp_price[$i]=$data['SUM(price)'];//수금액

											if($sp_date[$i]==""){
												$sp_date[$i]=$sp_date_collection[$i];
											}

											if($sp_total_price[$i]==""){
												$sp_total_price[$i]=0;
											}

											if($sp_return_price[$i]==""){
												$sp_return_price[$i]=0;
											}

                                            if($sp_price[$i]==""){
												$sp_price[$i]=0;
											}


                                   ?>
                                        <tr>
											<td data-title="일자" style="text-align: center;"><?=$sp_date[$i]?></td>
                                            <td data-title="매출액" style="text-align: center;"><?=number_format($sp_total_price[$i])?></td>							
											<td data-title="반품액" style="text-align: center;"><?=number_format($sp_return_price[$i])?></td>							
											<td data-title="수금액" style="text-align: center;"><?=number_format($sp_price[$i])?></td>
                                        </tr>
									<?
										$i++;
				                     }
									?>
									<!---->
                                    </tbody>
                                </table>

									
                           </div>
                        </div>

					
							

							 

							
							
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
		</div>
</section>

</form>

<script>

(function () {


   var start_date=document.getElementById("start_date").value;
   var end_date=document.getElementById("end_date").value;


   if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();

	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("price_list").innerHTML=xmlhttp.responseText;
  
   }
   }

   


   xmlhttp.open("POST","sale_list_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp.send("start_date="+start_date+"&end_date="+end_date);
})()


function date_change(){
	
	
  var start_date=document.getElementById("start_date").value;
   var end_date=document.getElementById("end_date").value;




   if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("price_list").innerHTML=xmlhttp.responseText;
  
   }
   }


   xmlhttp.open("POST","sale_list_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp.send("start_date="+start_date+"&end_date="+end_date);
}
</script>

<!--END 매출 리스트-->














			



<!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

	<!-- Autosize Plugin Js -->
	<script src="../plugins/autosize/autosize.js"></script>

	<!-- Moment Plugin Js -->
	<script src="../plugins/momentjs/moment.js"></script>
	
	<!-- Bootstrap Material Datetime Picker Plugin Js -->
	<script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>


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
	

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
	<script src="../js/pages/ui/notifications.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

	<!-- Modal Js -->
    <script src="../js/modal.js"></script>


</body>
</html>