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
<?
/*stock_sp 테이블*/
$stockio_query="SELECT *
              FROM stock_sp
			  WHERE sort='매출'
              ORDER BY index_num DESC";
$stockio_result=mysqli_query($conn,$stockio_query);
?>

<form id="frm" name="frm"  method="post" action="">
<section class="content">
<div class="deep">
                <div class="tit_bdy1">매출 수금 등록</div>

				

				<div class="container-fluid">
            <div class="block-header" >
                
   



				<div class="row clearfix" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">                      
                        <div class="body">
                            <div class="row clearfix">

							
							<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left: 10px;">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color: rgba(255, 255, 255, 0.6);" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">일자</th>
											<th style="text-align: center;">거래처명</th>
											<th style="text-align: center;">총 품목</th>
                                            <th style="text-align: center;">총 합계</th>
											<th style="text-align: center;">반품계</th>
											<th style="text-align: center;">수금계</th>
											<th style="text-align: center;">할인계</th>
											<th style="text-align: center;">비고</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($stockio_data=mysqli_fetch_array($stockio_result)){
									?>
                                        <tr style="cursor:pointer;" onclick="edit(<?=$stockio_data['index_num']?>,'<?=$stockio_data['manager']?>','<?=$stockio_data['date']?>','<?=$stockio_data['company']?>','<?=$stockio_data['stock_count']?>','<?=$stockio_data['total_price']?>','<?=$stockio_data['return_price']?>',<?=$stockio_data['price']?>,'<?=$stockio_data['dc_price']?>','<?=$stockio_data['blank']?>');">
                                            <td data-title="No" style="text-align: center;"><?=$stockio_data['index_num']?></td>
											<td data-title="일자" style="text-align: center;"><?=$stockio_data['date']?></td>
											<td data-title="거래처명" style="text-align: center;"><?=$stockio_data['company']?></td>
                                            <td data-title="총 품목" style="text-align: center;"><?=$stockio_data['stock_count']?></td>
											<td data-title="총 합계" style="text-align: center;"><?=$stockio_data['total_price']?></td>
											<td data-title="반품계" style="text-align: center;"><?=$stockio_data['return_price']?></td>
											<td data-title="수급계" style="text-align: center;"><?=$stockio_data['price']?></td>						
											<td data-title="할인계" style="text-align: center;"><?=$stockio_data['dc_price']?></td>						
											<td data-title="비고" style="text-align: center;"><?=$stockio_data['blank']?></td>
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

<!--END 매출 리스트-->



<!-- Modal -->
			<form id="sale_edit" name="sale_edit" action="sale_collection_register.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">매출 수금 관리</h4>
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
                                        <div class="form-line"><strong>일자</strong>
                                            <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="" value="" readonly>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>담당자</strong>
                                            <input type="text" class="form-control" id="sale_manager" name="sale_manager" value="" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>



								<div class="col-md-6">
                                    <b>거래처명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="sale_company" name="sale_company" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                </div>


								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>총 합계</strong>
                                            <input type="text" class="form-control" id="sale_total_price" name="sale_total_price" value="" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>총 수금계</strong>
                                            <input type="text" class="form-control" id="sale_price" name="sale_price" value="" placeholder="" readonly>
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
													<th style="text-align: center;">일자</th>
													<th style="text-align: center;">수금액</th>
													<th style="text-align: center;">구분</th>                                          
													<th style="text-align: center;">계좌</th>
													<th style="text-align: center;">비고</th>
													<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="sale_collection_list">
			
											     
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
											<th style="text-align: center;">일자</th>
											<th style="text-align: center;">수금액</th>
                                            <th style="text-align: center;">구분</th>                                          
                                            <th style="text-align: center;">계좌</th>
											<th style="text-align: center;">비고</th>
											<th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_collection">
                                     <div>
								  <td colspan="10" id='explain_list_collection'>※ 수금액을 추가해 주세요.</td>
								  </div>
                                    </tbody>
									<td colspan="10" ><center><button type="button" onclick="collection_write()" class="btn btn-primary m-t-15 waves-effect">추가</button></center></td>
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
				/*if($('#sale_warehouse').val()==''){
					alert("입고 창고를 선택해 주세요.");

					return false;
				}*/


							

			}

			var n=1;
			var nn=0; 
			var last=1;
			/*원재료 제조일자 별로 추가 작성*/
			function collection_write(){
				 
					 $("#explain_list_collection").hide();

					 var hidden_index=document.getElementById("hidden_index").value;
                    
					
                     $('#add_collection').append('<tr id='+n+' style="cursor:default;"><td id='+n+' data-title="No" style="text-align: center;">'+n+'</td><td id='+n+' data-title="일자" style="text-align: center;"><input type="date" class="form-control"   name="date[]" placeholder="" required></td><td id='+n+'  data-title="수금액" style="text-align: center;"><input type="number" class="form-control"  name="price[]" placeholder="" required></td><td id='+n+' data-title="구분" style="text-align: center;"><select class="form-control show-tick" id='+n+' name="sort[]" style="width:200px;"><option value="현금">현금</option><option value="무통장입금">무통장입금</option><option value="카드">카드</option><option value="기타">기타</option></select></td><td id='+n+' data-title="계좌" style="text-align: center;"><input type="text" class="form-control"  id="account'+nn+'" name="account[]" placeholder="" onclick="search_account('+nn+')" readonly></td><td id='+n+' data-title="비고" style="text-align: center;"><input type="text" class="form-control"  name="blank[]" placeholder="" ></td><td id='+n+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv('+n+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
						
					 n++;
					 last++;
					 nn++;
                     
					

				 
			}

           
			function deleteDiv(obj) {
     			var no = obj;
				
				$("#"+no).remove();

				--last;
				
				for(var i=0; i<n; i++){
					if(last==1){
						
						$("#explain_list_collection").show();
					}
				}
			
			}

			function deleteDiv2(index_num,sp_num,price) {

				       


				if (confirm("정말 삭제하시겠습니까??") == true){    //확인

					       var sum_price=document.getElementById("sale_price").value;

					if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
							
							
						   }else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

							
						   }

						   xmlhttp.onreadystatechange=function(){
						   if (xmlhttp.readyState==4 && xmlhttp.status==200){
     			
				           $("#collection_tr"+index_num).remove();
						   document.getElementById("sale_price").value=sum_price;

						    }
						   }

						   sum_price=Number(sum_price)-Number(price);
						   


						   xmlhttp.open("POST","sale_collection_ajax.php",true);
						   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						   xmlhttp.send("delete_num="+index_num+"&sp_num="+sp_num+"&sum_price="+sum_price);




				}else{   //취소
					
					return;
				}

			
			
			}

	

			</script>
			</form>
            <!-- END Modal-->




			<!-- Modal2  계좌검색-->
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal2 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">계좌 검색</h4>
                  </div>
              <!-- END Modal2 header-->

              <!-- Modal2 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">


				  <input type="hidden" id="h_account_i" value="">
				  <input type="hidden" id="h_account" value="">
              
			      
                        
                  <!--content-->

				  <?
					/*client 테이블*/
					  $client_query="SELECT  A.business_num, A.company_name, B.index_num, B.bank, B.account, B.account_name,B.blank
									FROM client A
									INNER JOIN stock_account B
									ON A.index_num=B.company_index
									WHERE B.state='n'";
					$client_result=mysqli_query($conn,$client_query);
					?>

					<!--client list-->
					<div class="body" >
                            <div class="table-responsive" id="no-more-tables">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">No</th>
											<th style="text-align: center;">사업자 번호</th>
                                            <th style="text-align: center;">거래처명</th>
											<th style="text-align: center;">은행</th>
											<th style="text-align: center;">계좌</th>
											<th style="text-align: center;">예금주</th>
											<th style="text-align: center;">비고</th>
											<th style="text-align: center;">선택</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($client_data=mysqli_fetch_array($client_result)){
									?>
                                        <tr style="cursor:default;">
										    <td data-title="No" style="text-align: center;"><?=$client_data['index_num']?></td>
                                            <td data-title="사업자 번호" style="text-align: center; "><?=$client_data['business_num']?></td>
											<td data-title="거래처명" style="text-align: center;"><?=$client_data['company_name']?></td>                                
											<td data-title="은행" style="text-align: center;"><?=$client_data['bank']?></td>
											<td data-title="계좌" style="text-align: center;"><?=$client_data['account']?></td>
											<td data-title="예금주" style="text-align: center;"><?=$client_data['account_name']?></td>
											<td data-title="비고" style="text-align: center;"><?=$client_data['blank']?></td>						
											<td data-title="선택" style="text-align: center;"><button type="button" onclick="company_sel('<?=$client_data['bank']?>','<?=$client_data['account']?>','<?=$client_data['account_name']?>')" class="btn btn-primary waves-effect">선택</button></td>
                                        </tr>
									<?
							        }
									?>
                                    </tbody>
                                </table>
                           </div>
                        </div>
					
					<!--client list-->




                  <!--END content-->
                               
                        
                                 

                   </div>


                  </div>

             
              <!-- END Modal2 body-->

                  <!-- Modal2 footer-->   
                  <div class="modal-footer">   
              
                  </div>
              <!-- END Modal2 footer--> 


              </div>
            </div>
            </div>

			<script>
			/*거래처 검색*/
			function search_account(i,sort){
				  $('#Modal2').modal();


				  document.getElementById("h_account_i").value=i;
				   document.getElementById("h_account").value=sort;
			}

			/*계좌 선택*/
			function company_sel(bank,account,account_name){

				var i=document.getElementById("h_account_i").value;
				var sort=document.getElementById("h_account").value;
				if(sort=="edit"){
				
				 document.getElementById('collection_account'+i).value=bank+account+account_name;
				}else{

					document.getElementById('account'+i).value=bank+account+account_name;
				}

				 $('#Modal2').modal('toggle');//모달 닫기
				$('.modal-backdrop').hide();//모달 fade 제거
			}
			</script>
            <!-- END Modal2-->





			










			<script>
	
			/* 수정*/
    function edit(index_num,manager,date,company,stock_count,total_price,return_price,price,dc_price,blank){
  
	 $('#Modal').modal();

     

	 document.getElementById("hidden_index").value=index_num;
	 document.getElementById("sale_manager").value=manager;
	 document.getElementById("sale_date").value=date;
	 document.getElementById("sale_company").value=company;
	 document.getElementById("sale_total_price").value=total_price;
	 document.getElementById("sale_price").value=price;


	  if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("sale_collection_list").innerHTML=xmlhttp.responseText;
   }
   }


   xmlhttp.open("POST","sale_collection_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp.send("sp_num="+index_num);

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