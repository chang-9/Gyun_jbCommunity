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
                <div class="tit_bdy1">매출 등록</div>

				

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
                                        <tr style="cursor:pointer;" onclick="edit(<?=$stockio_data['index_num']?>,'<?=$stockio_data['manager']?>','<?=$stockio_data['date']?>','<?=$stockio_data['company']?>','<?=$stockio_data['blank']?>');">
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
							

							<div style="float:right; margin-right:10px;">
							<button  type="button"  data-toggle="modal" data-target="#Modal2" onclick="hidden_change()" class="btn btn-primary m-t-15 waves-effect">매출 등록</button>
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

<!--END 입고 리스트-->







<!--수정 Modal-->
<?include("sale_edit.php");?>




        

            <!-- Modal2 -->
			<form id="sale_register" name="sale_register" action="sale_register.php" method="post" onsubmit="return form_check2();">
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal2 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">매출 입력</h4>
                  </div>
				  <!-- END Modal2 header-->

				  <!-- Modal2 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
				  
				  

					            <!-- new1-->
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>등록일자</strong>
                                            <input type="date" class="form-control" id="sale_date2" name="sale_date2" value="<?=date('Y-m-d');?>" placeholder="" required>
											<input type="hidden" id="sale" name="sale" value="sale">
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>담당자</strong>
                                            <input type="text" class="form-control" id="sale_manager2" name="sale_manager2" value="<?=$_SESSION['name'];?>" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <b>거래처명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text"  id="sale_company2" name="sale_company2" class="form-control" value="" readonly>
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal5" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons" onclick="hidden_change2()">search</i></button>
                                        </span>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>비고</strong>
                                            <input type="text" class="form-control" id="sale_blank2" name="sale_blank2" value="" placeholder="" >
                                        </div>
                                    </div>
                                </div>
								<!--END new1-->




								<hr width="100%" style="    border-top-color:rgb(158, 158, 158);">
							  <span><button  type="button" style="margin-left:10px; margin-bottom:10px;"  data-toggle="modal" data-target="#Modal3" class=" btn btn-primary m-t-15 waves-effect" >완제품 품목에서</button></span>

							  <span><button  type="button" style="margin-right:10px; margin-bottom:10px; float:right;"  onclick="finished_register()" class=" btn btn-primary m-t-15 waves-effect" >완제품 등록</button></span>
							  
                              </div>

							 




							  <!---->									
					<div class="body" style="margin-right: 0px; margin-left: 0px;">


                            <div class="table-responsive col-sm-12" id="no-more-tables">
                                <table class='table table-striped table-bordered' >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">상품번호</th>
											<th style="text-align: center;">상품명</th>
											<th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">주문수량</th>
											<th style="text-align: center;">제조일자</th>
											<th style="text-align: center;">원가</th>
											<th style="text-align: center;">현재 수량</th>
                                            <th style="text-align: center;">수량</th>
                                            <th style="text-align: center;">단가(원)</th>
											<th style="text-align: center;">공급가</th>
											<th style="text-align: center;">부가세</th>
											<th style="text-align: center;">할인가</th>
											<th style="text-align: center;">판매가</th>
											<th style="text-align: center;">거래구분</th>
											<th style="text-align: center;">비고</th>
											<th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_stock2">
                                     <div>
								  <td colspan="15" id='explain_list2'>※ 완제품을 선택하여 추가해 주세요.</td>
								  </div>
                                    </tbody>
									<tbody id="result2" style="">

									 <div>
								  <td style="text-align: center;font-weight: bold;">합계</td>
								  <td ></td>
								  <td ></td>
								  <td ></td>
								  <td ></td>
								  <td ></td>
								  <td ></td>
								  <td style="text-align: center;font-weight: bold;" id='sum_allcount'></td>
								  <td style="text-align: center;font-weight: bold;" id='sum_oneprice'></td>
								  <td style="text-align: center;font-weight: bold;" id='sum_price'></td>
								  <td style="text-align: center;font-weight: bold;" id='sum_tax'></td>
								  <td ></td>
								  <td style="text-align: center;font-weight: bold;" id='sum_sellprice'></td>
								  <td ></td>
								  <td ></td>
								  <td ></td>
								  
									<input type="hidden" id="sum_allcount_result" name="sum_allcount_result">
									<input type="hidden" id="sum_sellprice_result" name="sum_sellprice_result">


									 </div>
									 </tbody>
                                </table>


                           </div>

                        </div>


						<!--END-->




                  </div>

				 
				  <!-- END Modal2 body-->

                  <!-- Modal2 footer-->   
                  <div class="modal-footer">   
				    <center>					
				    <button type="submit"  class="btn btn-primary m-t-15 waves-effect">저장</button>
					</center>
                  </div>
				  <!-- END Modal2 footer--> 


              </div>
            </div>
            </div>

          
			<script>
			/*Modal2 유효성 검사*/
			function form_check2(){
				if($('#sale_warehouse2').val()==''){
					alert("입고 창고를 선택해 주세요.");

					return false;
				}


							

			}

			function hidden_change(){
				document.getElementById("hidden_sale_search").value="등록";
			}

			function hidden_change2(){
				document.getElementById("hidden_company_search").value="등록";
			}


			</script>
			</form>
            <!-- END Modal2-->



          <!-- Modal5  거래처검색-->
            <div class="modal" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal5 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">거래처 검색</h4>
                  </div>
              <!-- END Modal5 header-->

              <!-- Modal5 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
              
			      <input type="hidden" id="hidden_company_search" value="">
                        
                  <!--content-->

				  <?
					/*client 테이블*/
					  $client_query="SELECT *
                          FROM client
                          WHERE division='사용' ";
					$client_result=mysqli_query($conn,$client_query);
					?>

					<!--client list-->
					<div class="body" >
                            <div class="table-responsive" id="no-more-tables">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">사업자 번호</th>
											<th style="text-align: center;">거래처명</th>
                                            <th style="text-align: center;">거래처 구분</th>
											<th style="text-align: center;">대표자명</th>
											<th style="text-align: center;">전화번호</th>
                                            <th style="text-align: center;">주소</th>
                                            <th style="text-align: center;">팩스</th>
											<th style="text-align: center;">Email</th>
											<th style="text-align: center;">선택</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($client_data=mysqli_fetch_array($client_result)){
									?>
                                        <tr style="cursor:default;">
                                            <td data-title="사업자 번호" style="text-align: center; "><?=$client_data['business_num']?></td>
											<td data-title="거래처명" style="text-align: center;"><?=$client_data['company_name']?></td>
                                            <td data-title="거래처 구분" style="text-align: center;"><?=$client_data['client_type']?></td>
											<td data-title="대표자명" style="text-align: center;"><?=$client_data['representative']?></td>
											<td data-title="전화번호" style="text-align: center;"><?=$client_data['tel']?></td>
											<td data-title="주소" style="text-align: center;"><?=$client_data['address']?></td>						
											<td data-title="팩스" style="text-align: center;"><?=$client_data['fax_num']?></td>
											<td data-title="Email" style="text-align: center;"><?=$client_data['e_mail']?></td>
											<td data-title="선택" style="text-align: center;"><button type="button" onclick="company_sel('<?=$client_data['company_name']?>')" class="btn btn-primary waves-effect">선택</button></td>
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

             
              <!-- END Modal5 body-->

                  <!-- Modal5 footer-->   
                  <div class="modal-footer">   
              
                  </div>
              <!-- END Modal5 footer--> 


              </div>
            </div>
            </div>

			<script>
			/*거래처 선택*/
			function company_sel(company_name){
				 var hidden_value=document.getElementById("hidden_company_search").value;

				 if(hidden_value=="수정"){//수정 시 거래처 검색

					 document.getElementById("sale_company").value=company_name;

					 $('#Modal5').modal('toggle');//모달 닫기
					 $('.modal-backdrop').hide();//모달 fade 제거

				 }else{//신규 등록 시 거래처 검색
                    
					document.getElementById("sale_company2").value=company_name;

					 $('#Modal5').modal('toggle');//모달 닫기
					 //$('.modal-backdrop').hide();//모달 fade 제거

				 }
			}
			</script>
            <!-- END Modal5-->


			<!-- Modal3  완제품 검색-->
            <div class="modal" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal3 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">완제품 검색</h4>
                  </div>
              <!-- END Modal3 header-->

              <!-- Modal3 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
              
			      <input type="hidden" id="hidden_sale_search" value="">
                        
                  <!--content-->

				  <?
						  $stock_search_query="SELECT *
                          FROM stock                          
                          WHERE sort like '완제품' AND division like '사용'";

					$stock_search_result=mysqli_query($conn,$stock_search_query);

					?>

					<!-- list-->
					<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">상품번호</th>
                                            <th style="text-align: center;">구분</th>
											<th style="text-align: center;">상품명</th>
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">재고 수량</th>
											<th style="text-align: center;">선택</th>
                                        </tr>

                                    </thead>
                                    <tbody>
									<?
									while($stock_join_data=mysqli_fetch_array($stock_search_result)){
									?>
                                        <tr style="cursor:default;">
                                         <td data-title="상품번호" style="text-align: center;"><?=$stock_join_data['index_num']?></td>
										 <td data-title="구분" style="text-align: center;"><?=$stock_join_data['sort']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;" ><?=$stock_join_data['goods_name']?></a></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$stock_join_data['goods_size']?></td>
											<td data-title="재고 수량" style="text-align: center;"><?=$stock_join_data['sum']?></td>
											<td data-title="선택" style="text-align: center;"><button type="button" id="click_button<?=$stock_join_data['index_num']?>" name="click_button"
											data-toggle="modal" onclick="sale_count_func(<?=$stock_join_data['index_num']?>);disable(this);" class="btn btn-primary m-t-15 waves-effect">선택</button></td>
                                        </tr>
									<?
							        }
									

									
									?>
                                    </tbody>
                                </table>
                            </div>

							
					
					<!-- list-->




                  <!--END content-->
                               
                        
                                 

                   </div>


                  </div>

             
              <!-- END Modal3 body-->

                  <!-- Modal3 footer-->   
                  <div class="modal-footer">   
                   <center>					
				    <button type="button" onclick="close_modal3();" class="btn btn-primary m-t-15 waves-effect">완료</button>
					</center>
                  </div>
              <!-- END Modal3 footer--> 


              </div>
            </div>
            </div>

<!-- Modal6  상품수량 선택-->
            <div class="modal" id="Modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal6 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">상품수량 입력</h4>
                  </div>
              <!-- END Modal6 header-->

              <!-- Modal5 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
              
                        
                  <!--content-->

					<!--client list-->
					<div class="body" >
                            <div class="table-responsive" id="no-more-tables">
							<input type="hidden" id="sale_index_num" value="">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">수량</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
										<tr >
										<td >
                                            <input type="number" style="width:100%;" class="form-control"  id="sale_count" name="sale_count" value="1" placeholder="" >
										</td>
										</tr>
									
                                    </tbody>
                                </table>
								<div id="sale_listtt"></div>

                           </div>
                        </div>
					
					<!--client list-->




                  <!--END content-->
                               
                        
                                 

                   </div>


                  </div>

             
              <!-- END Modal6 body-->

                  <!-- Modal6 footer-->   
                  <div class="modal-footer">   
                   <center>					
				    <button type="button" onclick="close_modal6();sale_count_register('s');" class="btn btn-primary m-t-15 waves-effect">완료</button>
					</center>
                  </div>
              <!-- END Modal6 footer--> 


              </div>
            </div>
            </div>


			<script>

			
			var hidden_value="";
			var oneprice=0;
			var ssum=0;
			var stock_allcount=0;
			var sumprice=0;
			var sumprice_result=0;
			var sumtax;
			var sumsellprice=0;
			var rest_count2=0;
			var a=0;
			var n=1;
            var last=1;
			var n2=1;
            var last2=1;
			var k=1;
			var nn=1;
			var n4=1;
			var m=0;
			var sum=0;
			var n5=0;
			var countsum=0;
			var p_name=0;
			var product_name=0;
			var allcounttwo_sum=0;
			var index=1;
			var h_count2=0;
			var h_count3=0;

			

			function rowspan_func(h_count){
				if(hidden_value=="수정"){
					var other_rowspan=n;
					var tmp_name="";

					for(var a=0;a<Number(h_count);a++){
						var first_rowspan=Number(n)-Number(h_count);
						var p_name=document.getElementById("product_name"+first_rowspan).value;
						
						if(tmp_name!=p_name&a==0){
							document.getElementById("test"+first_rowspan+p_name).rowSpan=Number(h_count);
							document.getElementById("size"+first_rowspan+p_name).rowSpan=Number(h_count);
							document.getElementById("del"+first_rowspan+p_name).rowSpan=Number(h_count);
							document.getElementById("ordercount"+first_rowspan+p_name).rowSpan=Number(h_count);
							tmp_name=p_name;
						}
						if(tmp_name==p_name&a!=0){
							other_rowspan=Number(other_rowspan)-1;
							document.getElementById("test"+other_rowspan+p_name).remove();
							document.getElementById("size"+other_rowspan+p_name).remove();
							document.getElementById("del"+other_rowspan+p_name).remove();
							document.getElementById("ordercount"+other_rowspan+p_name).remove();
						}
					}
				}
				else{
				var other_rowspan=n2;
				var tmp_name="";

				for(var a=0;a<Number(h_count);a++){
					var first_rowspan=Number(n2)-Number(h_count);
				//	alert(first_rowspan);
					var p_name=document.getElementById("product_name"+first_rowspan).value;
					
					if(tmp_name!=p_name&a==0){
						document.getElementById("test"+first_rowspan+p_name).rowSpan=Number(h_count);
						document.getElementById("size"+first_rowspan+p_name).rowSpan=Number(h_count);
						document.getElementById("del"+first_rowspan+p_name).rowSpan=Number(h_count);
						document.getElementById("ordercount"+first_rowspan+p_name).rowSpan=Number(h_count);
						tmp_name=p_name;
					}
					if(tmp_name==p_name&a!=0){
						other_rowspan=Number(other_rowspan)-1;
						document.getElementById("test"+other_rowspan+p_name).remove();
						document.getElementById("size"+other_rowspan+p_name).remove();
						document.getElementById("del"+other_rowspan+p_name).remove();
						document.getElementById("ordercount"+other_rowspan+p_name).remove();
					}
				}
				}
			}


			function sale_count_register(sp_sort){
				var sale_count=document.getElementById("sale_count").value;
				var sale_index_num=document.getElementById("sale_index_num").value;

				if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				
				
			   }else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			   }

			   xmlhttp.onreadystatechange=function(){
			   if (xmlhttp.readyState==4 && xmlhttp.status==200){


				    document.getElementById("sale_listtt").innerHTML=xmlhttp.responseText;

				 var h_sale_stock_num=document.getElementsByName('h_sale_stock_num[]');
				 var h_sale_stock_sort=document.getElementsByName('h_sale_stock_sort[]');
				 var h_sale_stock_name=document.getElementsByName('h_sale_stock_name[]');
				 var h_sale_stock_size=document.getElementsByName('h_sale_stock_size[]');
				 var h_sale_stock_date=document.getElementsByName('h_sale_stock_date[]');
				 var h_sale_stock_price=document.getElementsByName('h_sale_stock_price[]');
				 var h_sale_stock_allcount=document.getElementsByName('h_sale_stock_allcount[]');
				 var h_sale_stock_count=document.getElementsByName('h_sale_stock_count[]');
				 var h_sale_stock_costprice=document.getElementsByName('h_sale_stock_cost_price[]');
 				 var h_stock_joint_num=document.getElementsByName('h_stock_joint_num[]');


				// document.getElementById("stock_rest").innerHTML=xmlhttp.responseText;
				 

				 var h_count=document.getElementById("h_count").value;
				 h_count2=document.getElementById("h_count").value;
				
				
				 for(var i=0;i<h_count;i++){
					var stock_num=h_sale_stock_num[i].value;
					var stock_sort=h_sale_stock_sort[i].value;
					var stock_name=h_sale_stock_name[i].value;
					var stock_size=h_sale_stock_size[i].value;
					var stock_date=h_sale_stock_date[i].value;
					var stock_price=h_sale_stock_price[i].value;
					stock_allcount=h_sale_stock_allcount[i].value;
					var stock_count=h_sale_stock_count[i].value;
					var stock_costprice=h_sale_stock_costprice[i].value;
					var stock_joint_num=h_stock_joint_num[i].value;

					stock_join_sel(stock_num,stock_sort,stock_name,stock_size,stock_date,stock_price,stock_allcount,stock_count,sale_count,h_count,stock_costprice,stock_joint_num);
																									//작성수량		현재수량

					ssum=ssum+Number(stock_allcount);
					oneprice=oneprice+Number(stock_price);

					sumprice_result=stock_allcount*stock_price;
					sumprice=sumprice_result+sumprice;
					sumtax=sumprice*0.1;
				 }
					rowspan_func(h_count);

					document.getElementById("sum_allcount").innerHTML=ssum;
					document.getElementById("sum_allcount_result").value=ssum;

					document.getElementById("sum_oneprice").innerHTML=oneprice;
					document.getElementById("sum_price").innerHTML=sumprice;
					document.getElementById("sum_tax").innerHTML=sumtax;
					sumsellprice=sumprice+sumtax;
					document.getElementById("sum_sellprice").innerHTML=sumsellprice;
					document.getElementById("sum_sellprice_result").value=sumsellprice;



			   }

			   }

			   xmlhttp.open("POST","sale_count_register_ajax.php",true);
			   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				 xmlhttp.send("sale_count="+sale_count+"&sale_index_num="+sale_index_num+"&sp_sort="+sp_sort);
		


			}


			 function supply_price(num){
				 //alert(h_count2);
				 var sum_add_count2=0;
				 var allcounttwo=document.getElementById('allcounttwo'+num).value;	//현재 수량
				 var count = document.getElementById('counttwo'+num).value;	//변경 수량
				 var oneprice = document.getElementById("oneprice"+num).value;	//단가
				 document.getElementById("supplyprice"+num).value = Number(count)*Number(oneprice);	//공급가
				 document.getElementById("tax"+num).value = Math.round(0.1*count*oneprice);	//부가세 
				 var saleprice3 = document.getElementById("saleprice"+num).value; //할인가
				 document.getElementById("sellprice"+num).value = Number((count*oneprice))+Number((0.1*count*oneprice))-Number(saleprice3);	//판매가	

				 var h_count = document.getElementById('h_count'+num).value;	//원래 수량
				 var h_oneprice = document.getElementById('h_oneprice'+num).value;	//원래 단가

				 var sumallcount=document.getElementById("sum_allcount").innerHTML;	//합계
				 document.getElementById("sum_allcount").innerHTML=Number(sumallcount)-Number(h_count)+Number(count);
				 document.getElementById('h_count'+num).value=Number(count);


				 var sumoneprice=document.getElementById("sum_oneprice").innerHTML;	//단가
				 document.getElementById("sum_oneprice").innerHTML=Number(sumoneprice)-Number(h_oneprice)+Number(oneprice);
				 document.getElementById('h_oneprice'+num).value=Number(oneprice);

				 var sumprice=document.getElementById("sum_price").innerHTML;
				 var h_supplyprice=document.getElementById('h_supplyprice'+num).value;
				 var supplyprice=document.getElementById('supplyprice'+num).value;
				 document.getElementById("sum_price").innerHTML=Number(sumprice)-Number(h_supplyprice)+Number(supplyprice);	//공급가
				 document.getElementById('h_supplyprice'+num).value=Number(supplyprice);

				 var sumtax=document.getElementById("sum_tax").innerHTML;
				 var h_tax=document.getElementById('h_tax'+num).value;
				 var tax=document.getElementById('tax'+num).value;
				 document.getElementById("sum_tax").innerHTML=Number(sumtax)-Number(h_tax)+Number(tax);	//부가세
				 document.getElementById('h_tax'+num).value=Number(tax);

				 var sumsellprice=document.getElementById("sum_sellprice").innerHTML;
				 var h_sellprice=document.getElementById('h_sellprice'+num).value;
				 var sellprice=document.getElementById('sellprice'+num).value;
				 document.getElementById("sum_sellprice").innerHTML=Number(sumsellprice)-Number(h_sellprice)+Number(sellprice);	//판매가
				 document.getElementById('h_sellprice'+num).value=Number(sellprice);				 
				
				 if(Number(allcounttwo)<Number(count)){	//현재 수량 < 작성한 수량
					document.getElementById('counttwo'+num).value=Number(allcounttwo);
					document.getElementById("sum_allcount").innerHTML=Number(sumallcount)-Number(h_count)+Number(allcounttwo);
					var post_count=count;
				 }
				
				// var ordercount=document.getElementsByName('add_ordercount2[]');	//주문 수량
				 var add_count2=document.getElementsByName('add_count2[]');	//수량
				 var h_count33=document.getElementById('h_count33'+num).value;	//h_count 숫자
				
				//var ordercount=document.getElementById('ordercount'+num).value;	//변경후 주문 수량
				
				//alert("ordercount: "+ordercount);
				// for(var k=0;k<Number(h_count33);k++){
				//	ordercount[].
				// }
				
			}

			function order_count(ordercount,h_ordercount,h_count,stock_num,add_count,allcounttwo_sum){
				var sale_index_num=document.getElementById("sale_index_num").value;
				var send_addcount=Number(ordercount)-Number(allcounttwo_sum);
				if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				

			   }else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			   }

			   xmlhttp.onreadystatechange=function(){
			   if (xmlhttp.readyState==4 && xmlhttp.status==200){

				document.getElementById("sale_listtt").innerHTML=xmlhttp.responseText;

				 var h_sale_stock_num=document.getElementsByName('h_sale_stock_num[]');
				 var h_sale_stock_sort=document.getElementsByName('h_sale_stock_sort[]');
				 var h_sale_stock_name=document.getElementsByName('h_sale_stock_name[]');
				 var h_sale_stock_size=document.getElementsByName('h_sale_stock_size[]');
				 var h_sale_stock_date=document.getElementsByName('h_sale_stock_date[]');
				 var h_sale_stock_price=document.getElementsByName('h_sale_stock_price[]');
				 var h_sale_stock_costprice=document.getElementsByName('h_sale_stock_cost_price[]');
				 var h_sale_stock_allcount=document.getElementsByName('h_sale_stock_allcount[]');
				 var h_sale_stock_count=document.getElementsByName('h_sale_stock_count[]');
				 var h_stock_joint_num=document.getElementsByName('h_stock_joint_num[]');

				document.getElementById("stock_rest").innerHTML=xmlhttp.responseText;

				 var h_count=document.getElementById("h_count").value;

				 for(var i=0;i<h_count;i++){
					var stock_num=h_sale_stock_num[i].value;
					var stock_sort=h_sale_stock_sort[i].value;
					var stock_name=h_sale_stock_name[i].value;
					var stock_size=h_sale_stock_size[i].value;
					var stock_date=h_sale_stock_date[i].value;
					var stock_price=h_sale_stock_price[i].value;
					var stock_costprice=h_sale_stock_costprice[i].value;
					var stock_allcount=h_sale_stock_allcount[i].value;
					var stock_count=h_sale_stock_count[i].value;
					var stock_joint_num=h_stock_joint_num[i].value;

					stock_join_sel(stock_num,stock_sort,stock_name,stock_size,stock_date,stock_price,stock_allcount,stock_count,sale_count,h_count,stock_costprice,stock_joint_num);
																									//작성수량		현재수량

					ssum=ssum+Number(stock_allcount);
					oneprice=oneprice+Number(stock_price);

					sumprice_result=stock_allcount*stock_price;
					sumprice=sumprice_result+sumprice;
					sumtax=sumprice*0.1;
				 }
				h_count=Number(h_count)+Number(h_count2);
				h_count2=Number(h_count2)+1;
				
					rowspan_func(h_count);
				
			   }
			   }
			   xmlhttp.open("POST","sale_ordercount_edit_ajax.php",true);

			   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				 xmlhttp.send("sale_index_num="+sale_index_num+"&h_ordercount="+h_ordercount+"&ordercount="+ordercount+"&h_count="+h_count+"&stock_num="+stock_num+"&h_count2="+h_count2+"&send_addcount="+send_addcount);
			}

			function order_count_onkeyup(num,stock_num){//주문수량 변경시
				var ordercount=document.getElementById('ordercount'+num).value;	//변경후 주문 수량
				var h_ordercount=document.getElementById('h_ordercount'+num).value;	//변경전 주문 수량
				var allcounttwo=document.getElementById('allcounttwo'+num).value;	//현재 수량
				var count=document.getElementById('counttwo'+num).value;	//수량
				var h_count = document.getElementById('h_count'+num).value;	//원래 수량
				var sumallcount=document.getElementById("sum_allcount").innerHTML;	//합계
				var h_count33=document.getElementById('h_count33'+num).value;	

				var add_count=Number(ordercount)-Number(count);


				if(Number(allcounttwo)>=Number(ordercount)){	//현재수량 >= 주문수량
					document.getElementById('counttwo'+num).value=ordercount;
	
					var num2=num;	
					for(var aa=1;aa<h_count33;aa++){	//횟수만
						num2++;	
						document.getElementById('counttwo'+num2).value=0;
						supply_price(num2);
					} 
					supply_price(num);					
				}
    			else{//현재수량<주문수량
					var num3=num;	//1
					var allcounttwo_sum=0;

					for(var aa=1;aa<=Number(h_count33);aa++){
						var allcounttwo_count=document.getElementById('allcounttwo'+num3).value;	//1 2
						allcounttwo_sum=Number(allcounttwo_sum)+Number(allcounttwo_count);
						num3++;
					}
					if(Number(ordercount)<=Number(allcounttwo_sum)){	// 변경 후 주문수량 <= 현재수량 합 : 이 안에서 해결 가능
						var num4=Number(num)+1;//2   6

						document.getElementById('counttwo'+num).value=allcounttwo;

						for(var bb=1;bb<=Number(h_count33);bb++){// 4바퀴
							document.getElementById('counttwo'+num4).value=Number(ordercount)-Number(allcounttwo);//100-10
							var allcounttwo_count2=document.getElementById('allcounttwo'+num4).value;//현재수량 20
							var counttwo_value=document.getElementById('counttwo'+num4).value;//수량 20

							if(Number(allcounttwo_count2)<Number(counttwo_value)){
								document.getElementById('counttwo'+num4).value=allcounttwo_count2;
								var num6=Number(num4)+1;//3
								document.getElementById('counttwo'+num6).value=Number(counttwo_value)-Number(allcounttwo_count2);
								supply_price(num6);
							}
							if(Number(allcounttwo_count2)>=Number(counttwo_value)){
								num5=num4+1;//3
								document.getElementById('counttwo'+num5).value=0;
								supply_price(num5);
							}
						}
						supply_price(num4);						
					}
					var test=Number(num3)-1;	//4
					var test_allcount=document.getElementById('allcounttwo'+test).value;	//0개인 재고   0

					if(Number(ordercount)>Number(allcounttwo_sum)&test_allcount!=0){
						var num7=num;
						for(var cc=1;cc<=h_count33;cc++){
							var allcounttwo=document.getElementById('allcounttwo'+num7).value;
							document.getElementById('counttwo'+num7).value=Number(allcounttwo);
							num7++;
						}
						order_count(ordercount,h_ordercount,h_count,stock_num,add_count,allcounttwo_sum);
					}
						else{////////
							if(Number(ordercount)<Number(allcounttwo_sum)){
								document.getElementById('counttwo'+test).value=0;
								//document.getElementById('counttwo'+h_count33).value=0;
							}
							else{
						var zz=Number(num)+1;
						for(var vv=zz;vv<=test;vv++){//2~
							supply_price(vv);

						}
								for(var dd=1;dd<test;dd++){
									var current_allcounttwo=document.getElementById('allcounttwo'+num).value;
									document.getElementById('counttwo'+num).value=current_allcounttwo;
									num++;
								}
								document.getElementById('counttwo'+test).value=Number(ordercount)-Number(allcounttwo_sum);

							}
						}

					if(Number(ordercount)>Number(allcounttwo_sum)){// 주문수량>50		51~
						document.getElementById('counttwo'+test).value=Number(ordercount)-Number(allcounttwo_sum);
					}
				}
			}

			

			/*원재료 선택*/
			function stock_join_sel(stock_num,sort,name,size,date,price,allcount,count,sale_count,h_count,costprice,stock_joint_num){
				 hidden_value=document.getElementById("hidden_sale_search").value;
				 showNotification('',name);

				 if(hidden_value=="수정"){//수정 시 원재료 검색

					 $("#explain_list").hide();

					  $('#add_stock').append('<tr id='+n+' style="cursor:default;"><td id="stock_num'+n+name+'"  data-title="상품번호" style="text-align: center;vertical-align:middle">'+index+'<input id="stock_num'+n+'" type="hidden" name="add_stock_num[]" value="'+stock_num+'"><input id="index'+n+'" type="hidden" value="'+index+'"></td><td id="test'+n+name+'" name="productname" data-title="상품명" style="text-align: center;vertical-align:middle" value="'+name+'">'+name+'<input id="product_name'+n+'" type="hidden" name="add_name[]" value="'+name+'"></td><td id="size'+n+name+'" data-title="중량(g)" style="text-align: center;vertical-align:middle">'+size+'<input id="size'+n+'" type="hidden" name="add_size[]" value="'+size+'"></td><td type="number" id="ordercount'+n+name+'" data-title="주문수량" style="width:100px;text-align: center;vertical-align:middle" ><input type="number" id="ordercount'+n+'" onkeyup="order_count_onkeyup('+n+','+stock_num+')" class="form-control" value="'+sale_count+'"><input type="hidden" id="h_ordercount'+n+'" value="'+sale_count+'"></td><td id="date'+n+'"  data-title="제조일자" style="text-align: center;vertical-align:middle">'+date+'<input id='+n+' type="hidden" name="add_date[]" value="'+date+'"></td><td id='+n+'  data-title="현재 수량" style="text-align: center;vertical-align:middle">'+count+'<input id="allcounttwo'+n+'" type="hidden" name="add_allcount[]" value="'+count+'"></td><td id='+n+'  data-title="수량" style="text-align: center;vertical-align:middle"><input style="width:100px;" onkeyup="supply_price('+n+');" type="number" id="counttwo'+n+'" name="add_count[]" class="form-control" placeholder="" value="'+Math.round(allcount)+'" required><input type="hidden" id="h_count'+n+'" value="'+allcount+'"><input type="hidden" id="h2_count'+n+'" value="'+Math.round(allcount)+'"></td><td id='+n+'  data-title="단가(원)" style="text-align: center;vertical-align:middle"><input style="width:100px;" onkeyup="supply_price('+n+');" type="number" id="oneprice'+n+'" name="oneprice[]" class="form-control" placeholder="" value="'+Math.round(price)+'" required><input id="h_oneprice'+n+'" type="hidden" name="add_price2[]" value="'+price+'"></td><td id='+n+'  data-title="공급가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="supplyprice'+n+'" name="supplyprice2[]" value="'+Math.round(price*allcount)+'"><input type="hidden" id="h_supplyprice'+n+'" value="'+Math.round(price*allcount)+'"></td><td id='+n+'  data-title="부가세" style="text-align: center;vertical-align:middle" ><input type="" style="width:70px;border:none;background:none;text-align: center;" id="tax'+n+'" name="tax2[]" value="'+Math.round(price*allcount*0.1)+'"><input type="hidden" id="h_tax'+n+'" value="'+Math.round(price*allcount*0.1)+'"></td><td id='+n+'  data-title="할인가" onkeyup="supply_price('+n+');" style="text-align: center;vertical-align:middle"><input style="width:100px;" type="number" id="saleprice'+n+'" name="saleprice[]" class="form-control" placeholder="" value="0"   required></td><td id='+n+'  data-title="판매가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="sellprice'+n+'" name="sellprice2[]" value="'+Math.round(price*allcount*1.1)+'"><input type="hidden" id="h_sellprice'+n+'" value="'+Math.round(price*allcount*1.1)+'"></td><td id='+n+' data-title="거래구분" style="text-align: center;vertical-align:middle"><select class="form-control show-tick" id="casetwo'+n+'" name="add_case2[]"><option value="매출">매출</option></select></td><td id='+n+' data-title="비고" style="text-align: center;vertical-align:middle"><input style="width:100px;" type="text" id="blank'+n+'" name="blank[]" class="form-control" placeholder="" value=""  ></td><td id="del'+n+name+'" data-title="삭제" style="text-align: center;vertical-align:middle"><button type="button" onclick="deleteDiv2('+n+');disable2('+stock_num+');" class="btn btn-primary m-t-15 waves-effect">삭제</button></td><input id='+n+' type="" name="add_sort[]" value="'+sort+'"></tr>');
						
					 n++;
                     last++; 


				 }else{//신규 등록 시 원재료 검색
				  //   alert(h_count);
					 $("#explain_list2").hide();

					 $('#add_stock2').append('<tr id='+n2+' style="cursor:default;"><td id="stock_num'+n2+name+'"  data-title="상품번호" style="text-align: center;vertical-align:middle">'+index+'<input id="stock_num'+n2+'" type="hidden" name="add_stock_num2[]" value="'+stock_num+'"><input id='+n2+' type="hidden" name="h_stock_joint_num2[]" value="'+stock_joint_num+'" ><input type="hidden" name="h_count22[]" id="h_count33'+n2+'" value="'+h_count+'" ><input id='+n2+' type="hidden" name="h_stock_name[]" value="'+name+'" ><input id='+n2+' type="hidden" name="h_stock_size[]" value="'+size+'" ><input id="index'+n2+'" type="hidden" name="add_index[]" value="'+index+'"></td><td id="test'+n2+name+'" name="productname" data-title="상품명" style="text-align: center;vertical-align:middle" value="'+name+'">'+name+'<input id="product_name'+n2+'" type="hidden" name="add_name2[]" value="'+name+'"></td><td id="size'+n2+name+'" data-title="중량(g)" style="text-align: center;vertical-align:middle">'+size+'<input id="size'+n2+'" type="hidden" name="add_size2[]" value="'+size+'"></td><td type="number" id="ordercount'+n2+name+'" data-title="주문수량" style="width:100px;text-align: center;vertical-align:middle" ><input type="number" name="add_ordercount2[]" id="ordercount'+n2+'" onkeyup="order_count_onkeyup('+n2+','+stock_num+')" class="form-control" value="'+sale_count+'"><input type="hidden" id="h_ordercount'+n2+'" value="'+sale_count+'"></td><td id="date'+n2+'"  data-title="제조일자" style="text-align: center;vertical-align:middle">'+date+'<input id='+n2+' type="hidden" name="add_date2[]" value="'+date+'"></td><td id="cost'+n2+'"  data-title="원가" style="text-align: center;vertical-align:middle">'+costprice+'<input id='+n2+' type="hidden" name="add_cost2[]" value="'+costprice+'"></td><td id='+n2+'  data-title="현재 수량" style="text-align: center;vertical-align:middle">'+count+'<input id="allcounttwo'+n2+'" type="hidden" name="add_allcount2[]" value="'+count+'"></td><td id='+n2+'  data-title="수량" style="text-align: center;vertical-align:middle"><input style="width:100px;" onkeyup="supply_price('+n2+');" type="number" id="counttwo'+n2+'" name="add_count2[]" class="form-control" placeholder="" value="'+Math.round(allcount)+'" required><input type="hidden" id="h_count'+n2+'" value="'+allcount+'"><input type="hidden" id="h2_count'+n2+'" value="'+Math.round(allcount)+'"></td><td id='+n2+'  data-title="단가(원)" style="text-align: center;vertical-align:middle"><input style="width:100px;" onkeyup="supply_price('+n2+');" type="number" id="oneprice'+n2+'" name="oneprice2[]" class="form-control" placeholder="" value="'+Math.round(price)+'" required><input id="h_oneprice'+n2+'" type="hidden" name="add_price2[]" value="'+price+'"></td><td id='+n2+'  data-title="공급가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="supplyprice'+n2+'" name="supplyprice2[]" value="'+Math.round(price*allcount)+'"><input type="hidden" id="h_supplyprice'+n2+'" value="'+Math.round(price*allcount)+'"></td><td id='+n2+'  data-title="부가세" style="text-align: center;vertical-align:middle" ><input type="" style="width:70px;border:none;background:none;text-align: center;" id="tax'+n2+'" name="tax2[]" value="'+Math.round(price*allcount*0.1)+'"><input type="hidden" id="h_tax'+n2+'" value="'+Math.round(price*allcount*0.1)+'"></td><td id='+n2+'  data-title="할인가" style="text-align: center;vertical-align:middle" onkeyup="supply_price('+n2+');"><input style="width:100px;" type="number" id="saleprice'+n2+'" name="saleprice2[]" class="form-control" placeholder="" value="0"   required></td><td id='+n2+'  data-title="판매가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="sellprice'+n2+'" name="sellprice2[]" value="'+Math.round(price*allcount*1.1)+'"><input type="hidden" id="h_sellprice'+n2+'" value="'+Math.round(price*allcount*1.1)+'"></td><td id='+n2+' data-title="거래구분" style="text-align: center;vertical-align:middle"><select class="form-control show-tick" id="casetwo'+n2+'" name="add_case2[]"><option value="매출">매출</option></select></td><td id='+n2+' data-title="비고" style="text-align: center;vertical-align:middle"><input style="width:100px;" type="text" id="blank'+n2+'" name="blank[]" class="form-control" placeholder="" value="" ></td><td id="del'+n2+name+'" data-title="삭제" style="text-align: center;vertical-align:middle"><button type="button" onclick="deleteDiv2('+n2+');disable2('+stock_num+');" class="btn btn-primary m-t-15 waves-effect">삭제</button></td><input id='+n2+' type="hidden" name="add_sort2[]" value="'+sort+'"></tr>');

					
					 n2++;
                     last2++; 
					 index++;
				 }
		
			}


			function deleteDiv(obj) {
     			var no = obj;
				
				$("#"+no).remove();
				
				--last;
				
				for(var i=0; i<n; i++){
					if(last==1){
						
						$("#explain_list").show();
					}
				}

			}


			function deleteDiv2(obj) {
     			var no = obj;
				
				$("#"+no).remove();
				
				--last2;
				

				for(var i=0; i<n2; i++){
					if(last2==1){
						
						$("#explain_list2").show();
						document.getElementById("sum_allcount").innerHTML='';
					}
				}

			}

			 function disable(ctr)
			{
				 ctr.disabled = true;
			}

			function disable2(stock_num)
			{
				document.getElementById("click_button"+stock_num).disabled=false;
			}

			function close_modal3(){
				$('#Modal3').modal('toggle');//모달 닫기
				$('.modal-backdrop').hide();//모달 fade 제거

			}

			function close_modal4(){
				$('#Modal4').modal('toggle');//모달 닫기
				$('.modal-backdrop').hide();//모달 fade 제거

			}

			function close_modal6(){
				$('#Modal6').modal('toggle');//모달 닫기
				$('.modal-backdrop').hide();//모달 fade 제거

			}
			</script>
            <!-- END Modal3-->




			
			




<script>

function sale_count_func(index_num){

		 $('#Modal6').modal();
		
		 document.getElementById('sale_index_num').value=index_num;

}


 /* 수정*/
    /*function edit(index_num,manager,date,company,stock_count,total_price,return_price,price,dc_price,blank){
    
	
	 $('#Modal').modal();

     

	 document.getElementById("hidden_index").value=index_num;
	 //document.getElementById("sale_inout_num").value=inout_num;
	 document.getElementById("sale_manager").value=manager;
	 document.getElementById("sale_date").value=date;
	 document.getElementById("sale_company").value=company;
	 //document.getElementById("sale_warehouse").value=warehouse;
	// document.getElementById("hidden_sale_search").value="수정";
	  //document.getElementById("hidden_company_search").value="수정";
	 //document.getElementById("origin_total_count").value=total_count;
	 //document.getElementById("origin_price").value=price;
	 document.getElementById("sale_blank").value=blank;


	 



	 if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("sale_list").innerHTML=xmlhttp.responseText;
   }
   }


   xmlhttp.open("POST","sale_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("index_num="+index_num);

   }*/



/*원재료 관리 페이지로 이동*/
function stock_register(){
    
	if (confirm("원재료 관리 페이지로 이동하시겠습니까?") == true){    //확인
    window.location.replace('http://ccit.cafe24.com/CTSMS/information/stock.php');
}else{   //취소
    return;
}
	
}

/*완제품 관리 페이지로 이동*/
function finished_register(){
    
	if (confirm("완제품 관리 페이지로 이동하시겠습니까?") == true){    //확인
    window.location.replace('http://ccit.cafe24.com/CTSMS/information/finished_product.php');
}else{   //취소
    return;
}
	
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