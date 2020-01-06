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


<!--거래처 리스트-->
<?
/*client 테이블*/
$client_query="SELECT *
              FROM client
              ORDER BY index_num ASC";
$client_result=mysqli_query($conn,$client_query);
?>
<form id="frm" name="frm"  method="post" action="company_edit.php">
<section class="content">
<div class="deep">
  <div class="tit_bdy1">계좌 관리</div>
 
        <div class="container-fluid">
            <div class="block-header" >
                
   



				<div class="row clearfix" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">                      
                        <div class="body">
                            <div class="row clearfix">

							
							<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px;">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color: rgba(255, 255, 255, 0.6);" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">No</th>
											<th style="text-align: center;">사업자 번호</th>
                                            <th style="text-align: center;">거래처명</th>                                          
                                            <th style="text-align: center;">대표자명</th>
                                            <th style="text-align: center;">전화번호</th>
                                            <th style="text-align: center;">사용구분</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($client_data=mysqli_fetch_array($client_result)){
									?>
                                        <tr style="cursor:pointer;" onclick="edit(<?=$client_data['index_num']?>,'<?=$client_data['company_name']?>','<?=$client_data['business_num']?>')">
                                            <td data-title="No" style="text-align: center;"><?=$client_data['index_num']?></td>
                                            <td data-title="사업자 번호" style="text-align: center; "><?=$client_data['business_num']?></td>
                                            <td data-title="거래처명" style="text-align: center;"><?=$client_data['company_name']?></td>
                                            <td data-title="대표자명" style="text-align: center;"><?=$client_data['representative']?></td>
                                            <td data-title="전화번호" style="text-align: center;"><?=$client_data['tel']?></td>
											<td data-title="사용구분" style="text-align: center;"><?=$client_data['division']?></td>
                                        </tr>
									<?
							        }
									?>
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
<!--END 거래처 리스트-->



<!-- Modal -->
			<form id="account_register" name="account_register" action="account_register.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">계좌 관리</h4>
                  </div>
				  <!-- END Modal header-->

				  <!-- Modal body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
				  <input type="hidden" id="hidden_index" name="hidden_index" value="">
				  <input type="hidden" id="origin_total_count" name="origin_total_count" value="">
				  <input type="hidden" id="origin_price" name="origin_price" value="">
				  

					            <!-- new1-->
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>사업자 번호</strong>
                                            <input type="text" id="business_num" name="business_num" class="form-control" placeholder="" readonly required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>거래처명</strong>
                                            <input type="text" id="company_name" name="company_name" class="form-control" placeholder="" readonly required>
                                        </div>
                                    </div>
                                </div>


								<!--END new1-->




								<hr width="100%" style="    border-top-color:rgb(158, 158, 158);">
							
							  

                              </div>


						<!---->					
					<!-- Nav tabs -->
							  <div class="col-sm-12">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">수정/삭제</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">추가</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">

                                    <p>
                                     <!--content-->
							  <div class="col-sm-12" class="table-responsive" id="no-more-tables">
								<div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                  <table class="table table-bordered table-striped " style="width=100%; background-color:white;" >
												<thead>
													<tr>                                           
													<th style="text-align: center;">No</th>
													<th style="text-align: center;">은행</th>
													<th style="text-align: center;">계좌</th>
													<th style="text-align: center;">예금주</th>
													<th style="text-align: center;">비고</th>
													<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="account_list">
			
											     
												</tbody>

												
											</table>
									 </div>
								</div>

							
		
								
									<!--END content-->  
                                    </p>
                                </div>
						
                                <div role="tabpanel" class="tab-pane fade" id="profile">

                                    <p>
                                    <!--content2-->								
							  <div class="body" style="margin-right: 0px; margin-left: 0px;">


                            <div class="table-responsive col-sm-12" id="no-more-tables">
                                <table class='table table-striped table-bordered' >
                                    <thead>
                                        <tr>                                           
                                           <th style="text-align: center;">No</th>
										   <th style="text-align: center;">은행</th>
										   <th style="text-align: center;">계좌</th>
										   <th style="text-align: center;">예금주</th>
										   <th style="text-align: center;">비고</th>
										   <th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_account">
                                     <div>
								  <td colspan="7" id='explain_list_account'>※ 계좌 정보를 추가해 주세요.</td>
								  </div>
                                    </tbody>
									<td colspan="7" ><center><button type="button" onclick="account_write()" class="btn btn-primary m-t-15 waves-effect">추가</button></center></td>
                                </table>
                           </div>
                        </div>
									<!--END content2-->   
                                    </p>									
                                </div>
                                
                                
                            </div>
							</div>
							<!--END Nav tabs -->
						<!--END-->




                  </div>

				 
				  <!-- END Modal body-->

                  <!-- Modal footer-->   
                  <div class="modal-footer">   
				    <center>					
				    <button type="submit" name="btn_edit" class="btn btn-primary m-t-15 waves-effect">완료</button>
					</center>
                  </div>
				  <!-- END Modal footer--> 


              </div>
            </div>
            </div>

          
			<script>
			/*Modal 유효성 검사*/
			function form_check(){
		

			}

			var n=1;    
			var last=1;
			/*원재료 제조일자 별로 추가 작성*/
			function account_write(){
				 
					 $("#explain_list_account").hide();

					 var hidden_index=document.getElementById("hidden_index").value;
                    
					
                     $('#add_account').append('<tr id='+n+' style="cursor:default;"><td id='+n+' data-title="No" style="text-align: center;">'+n+'</td><td id='+n+'  data-title="은행" style="text-align: center;"><input type="text" class="form-control"  name="bank[]" placeholder="" required></td><td id='+n+' data-title="계좌" style="text-align: center;"><input type="text" class="form-control"  name="account[]" placeholder="" ></td><td id='+n+'  data-title="예금주" style="text-align: center;"><input type="text" class="form-control"  name="account_name[]" placeholder="" required></td><td id='+n+' data-title="비고" style="text-align: center;"><input type="text" class="form-control"  name="blank[]" placeholder="" ></td><td id='+n+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv('+n+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
						
					 n++;
					 last++;
                     
					

				 
			}

           
			function deleteDiv(obj) {
     			var no = obj;
				
				$("#"+no).remove();

				--last;
				
				for(var i=0; i<n; i++){
					if(last==1){
						
						$("#explain_list_account").show();
					}
				}
			
			}

			function deleteDiv2(index_num) {

				       


				if (confirm("정말 삭제하시겠습니까??") == true){    //확인

					      

					if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
							
							
						   }else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

							
						   }

						   xmlhttp.onreadystatechange=function(){
						   if (xmlhttp.readyState==4 && xmlhttp.status==200){
     			
				           $("#account_tr"+index_num).remove();

						     var hidden_index=document.getElementById("hidden_index").value;
							 var company=document.getElementById("company_name").value;
							 var business_num=document.getElementById("business_num").value;


							 if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
								xmlhttp2=new XMLHttpRequest();
								
								
							   }else{// code for IE6, IE5
								xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
								
								
							   }

							   xmlhttp2.onreadystatechange=function(){
							   if (xmlhttp2.readyState==4 && xmlhttp2.status==200){
							   document.getElementById("account_list").innerHTML=xmlhttp2.responseText;
							   }
							   }


							   xmlhttp2.open("POST","account_ajax.php",true);
							   xmlhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
							   xmlhttp2.send("company_index="+hidden_index);
						   

						    }
						   }

					
						   


						   xmlhttp.open("POST","account_ajax.php",true);
						   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						   xmlhttp.send("delete_num="+index_num);




				}else{   //취소
					
					return;
				}

			
			
			}

	

			</script>
			</form>
            <!-- END Modal-->










			<script>
	
			/* 수정*/
    function edit(index_num,company,business_num){
  
	 $('#Modal').modal();

     

	 document.getElementById("hidden_index").value=index_num;
	 document.getElementById("company_name").value=company;
	 document.getElementById("business_num").value=business_num;


	  if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("account_list").innerHTML=xmlhttp.responseText;
   }
   }


   xmlhttp.open("POST","account_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp.send("company_index="+index_num);

	}


			</script>



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