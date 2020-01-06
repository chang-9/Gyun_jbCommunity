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
			  WHERE sort='매입'
              ORDER BY index_num DESC";
$stockio_result=mysqli_query($conn,$stockio_query);
?>

<form id="frm" name="frm"  method="post" action="">
<section class="content">
<div class="deep">
                <div class="tit_bdy1">매입 등록</div>

				

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
											<th style="text-align: center;">지급계</th>
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
											<td data-title="지급계" style="text-align: center;"><?=$stockio_data['price']?></td>						
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
							<button  type="button"  data-toggle="modal" data-target="#Modal2" onclick="hidden_change()" class="btn btn-primary m-t-15 waves-effect">매입 등록</button>
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
<?include("purchase_edit.php");?>




        

            <!-- Modal2 -->
			<form id="sale_register" name="sale_register" action="purchase_register.php" method="post" onsubmit="return form_check2();">
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal2 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">매입 입력</h4>
                  </div>
				  <!-- END Modal2 header-->

				  <!-- Modal2 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
				  
				  

					            <!-- new1-->
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>등록일자</strong>
                                            <input type="date" class="form-control" value="<?=date('Y-m-d');?>" id="sale_date2" name="sale_date2" placeholder="" required>
											<input type="hidden" id="purchase" name="purchase" value="purchase">
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
                                            <input type="text" id="sale_company2" name="sale_company2" class="form-control" value="" readonly>
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
							  <span><button  type="button" style="margin-left:10px; margin-bottom:10px;"  data-toggle="modal" data-target="#Modal3" class=" btn btn-primary m-t-15 waves-effect" >원재료 품목에서</button></span>

							  <span><button  type="button" style="margin-right:10px; margin-bottom:10px; float:right;"  onclick="finished_register()" class=" btn btn-primary m-t-15 waves-effect" >원재료 등록</button></span>
							  
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
											<th style="text-align: center;">현재 수량</th>
                                            <th style="text-align: center;">수량</th>
                                            <th style="text-align: center;">원가(원)</th>
											<th style="text-align: center;">공급가</th>
											<th style="text-align: center;">부가세</th>
											<th style="text-align: center;">할인가</th>
											<th style="text-align: center;">매입가</th>
											<th style="text-align: center;">비고</th>
											<th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_stock2">
                                     <div>
								  <td colspan="13" id='explain_list2'>※ 제품을 선택하여 추가해 주세요.</td>
								  </div>
                                    </tbody>
									<tbody id="result2" style="">

									 <div>
								  <td style="text-align: center;font-weight: bold;">합계</td>
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


			<!-- Modal3  원재료 검색-->
            <div class="modal" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal3 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">원재료 검색</h4>
                  </div>
              <!-- END Modal3 header-->

              <!-- Modal3 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
              
			      <input type="hidden" id="hidden_sale_search" value="">
                        
                  <!--content-->

				  <?
						  $stock_search_query="SELECT DISTINCT (
stock_joint.index_num
), sort, goods_size, stock.goods_name
FROM stock
INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
WHERE sort NOT LIKE '완제품'
AND sort NOT LIKE '세트제품'
AND division LIKE '사용'
                          ORDER BY stock.index_num DESC";

					$stock_search_result=mysqli_query($conn,$stock_search_query);

					?>

					<!-- list-->
					<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">구분</th>
											<th style="text-align: center;">상품명</th>
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">선택</th>
                                        </tr>

                                    </thead>
                                    <tbody>
									<?
									while($stock_join_data=mysqli_fetch_array($stock_search_result)){
									?>
                                        <tr style="cursor:default;">
										 <td data-title="구분" style="text-align: center;"><?=$stock_join_data['sort']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;" ><?=$stock_join_data['goods_name']?></a></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$stock_join_data['goods_size']?></td>
											<td data-title="선택" style="text-align: center;"><button type="button" id="click_button<?=$stock_join_data['index_num']?>" name="click_button"
											data-toggle="modal" onclick="sale_count_func(<?=$stock_join_data['index_num']?>,<?=$stock_join_data['goods_date']?>);" class="btn btn-primary m-t-15 waves-effect">선택</button></td>
                                        </tr>
										
									<?
							        }
									?>
									<input id="hh_date" style="width:70px;border:none;background:none;text-align: center;" value="">
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
              <script>
			  </script>
                        
                  <!--content-->
					
					<!--client list-->
					<div class="body" >
                            <div class="table-responsive" id="no-more-tables">
							<input type="hidden" id="sale_index_num" value="">
							<input type="hidden" id="hh_goods_name" value="">

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">수량</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
										<tr >
										<td >
                                            <input type="number" style="width:100%;" class="form-control"  id="purchase_count" name="purchase_count" value="1" placeholder="" >
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
				    <button type="button" onclick="close_modal6();sale_count_register('p');" class="btn btn-primary m-t-15 waves-effect">완료</button>
					</center>
                  </div>
              <!-- END Modal6 footer--> 


              </div>
            </div>
            </div>


			<script>

			var purchase_index_num=0;
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

			
			

			function sale_count_register(sp_sort){//sp_sort:p //매입(purchase)
				var purchase_count=document.getElementById("purchase_count").value;	//입력하는 매입수량
				var sale_index_num=document.getElementById("sale_index_num").value;

				if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				
				
			   }else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			   }

			   xmlhttp.onreadystatechange=function(){
			   if (xmlhttp.readyState==4 && xmlhttp.status==200){


				    document.getElementById("sale_listtt").innerHTML=xmlhttp.responseText;

				 var h_index_num=document.getElementsByName('h_index_num');
				 var h_goods_name=document.getElementsByName('h_goods_name');
				 var h_goods_size=document.getElementsByName('h_goods_size');
				 var h_total_stock=document.getElementsByName('h_total_stock');
				 var h_goods_date=document.getElementsByName('h_goods_date');



					var stock_num=h_index_num[0].value;
					var goods_name=h_goods_name[0].value;
					var goods_size=h_goods_size[0].value;
					var total_stock=h_total_stock[0].value;	//현재수량
					var hh_date=h_goods_date[0].value;	

					stock_join_sel(stock_num,goods_name,goods_size,hh_date,purchase_count,total_stock);

					ssum=Number(ssum)+Number(purchase_count);

					document.getElementById("sum_allcount").innerHTML=ssum;
					document.getElementById("sum_allcount_result").value=ssum;

				var sum_sellprice_result=document.getElementById("sum_sellprice_result").value;
				var sum_allcount_result=document.getElementById("sum_allcount_result").value;


			   }

			   }
			   xmlhttp.open("POST","sale_count_register_ajax.php",true);
			   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				 xmlhttp.send("purchase_count="+purchase_count+"&sale_index_num="+sale_index_num+"&sp_sort="+sp_sort+"&hh_date="+hh_date+"&sum_allcount_result="+sum_allcount_result+"&sum_sellprice_result="+sum_sellprice_result);
		


			}


			 function supply_price(num){
				 var allcounttwo=document.getElementById('allcounttwo'+num).value;	//현재 수량
				 var count = document.getElementById('counttwo'+num).value;	//변경 수량
				 var oneprice = document.getElementById("oneprice"+num).value;	//원가
				 document.getElementById("supplyprice"+num).value = Number(count)*Number(oneprice);	//공급가
				 document.getElementById("tax"+num).value = Math.round(0.1*count*oneprice);	//부가세 
				 var saleprice = document.getElementById("saleprice"+num).value; //할인가
				 document.getElementById("sellprice"+num).value = Math.round(Number((count*oneprice))+Number((0.1*count*oneprice))-Number(saleprice));	//판매가	
				 

				 var h_count = document.getElementById('h_count'+num).value;	//원래 수량
				 var h_oneprice = document.getElementById('h_oneprice'+num).value;	//원래 원가

				 
				 var sumallcount=document.getElementById("sum_allcount").innerHTML;	//합계
				 document.getElementById("sum_allcount").innerHTML=Number(sumallcount)-Number(h_count)+Number(count);
				 document.getElementById('h_count'+num).value=Number(count);

				 

				 var sumoneprice=document.getElementById("sum_oneprice").innerHTML;	//원가
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
				
				document.getElementById("sum_sellprice_result").value=sumsellprice;

				 if(Number(allcounttwo)<Number(count)){	//현재 수량 < 작성한 수량
					//document.getElementById('counttwo'+num).value=Number(allcounttwo);
					document.getElementById("sum_allcount").innerHTML=Number(sumallcount)-Number(h_count)+Number(count);
					var post_count=count;
				 }
				 
			}

			
			
			var idx=1;
			var idx2=1;

			/*원재료 선택*/
			function stock_join_sel(stock_num,name,size,date,purchase_count,count){
				 hidden_value=document.getElementById("hidden_sale_search").value;
				 showNotification('',name);
				 

				 if(hidden_value=="수정"){//수정 시 원재료 검색

					 $("#explain_list").hide();

					   $('#add_stock').append('<tr id='+n+' style="cursor:default;"><td id="stock_num'+n+name+'"  data-title="상품번호" style="text-align: center;vertical-align:middle">'+idx+'<input id="stock_num'+n+'" type="hidden" name="add_stock_num[]" value="'+idx+'"><input id="index'+n+'" type="hidden" value="'+index+'"></td><td id="test'+n+name+'" name="productname" data-title="상품명" style="text-align: center;vertical-align:middle" value="'+name+'">'+name+'<input id="product_name'+n+'" type="hidden" name="add_name[]" value="'+name+'"></td><td id="size'+n+name+'" data-title="중량(g)" style="text-align: center;vertical-align:middle">'+size+'<input id="size'+n+'" type="hidden" name="add_size[]" value="'+size+'"></td><td id='+n+'  data-title="현재 수량" style="text-align: center;vertical-align:middle">'+count+'<input id="allcounttwo'+n+'" type="hidden" name="add_allcount[]" value="'+count+'"></td><td id='+n+'  data-title="수량" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n+');" type="number" id="counttwo'+n+'" name="add_count[]" class="form-control" placeholder="" value="'+purchase_count+'" required><input type="hidden" id="h_count'+n+'" value="'+purchase_count+'"><input type="hidden" id="h2_count'+n+'" value=""></td><td id='+n+'  data-title="원가(원)" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n+');" type="number" id="oneprice'+n+'" name="oneprice[]" class="form-control" placeholder="" value="" required><input id="h_oneprice'+n+'" type="hidden" name="add_price[]" value="0"></td><td id='+n+'  data-title="공급가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="supplyprice'+n+'" name="supplyprice[]" value="0"><input type="hidden" id="h_supplyprice'+n+'" value="0"></td><td id='+n+'  data-title="부가세" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="tax'+n+'" name="tax[]" value="0"><input type="hidden" id="h_tax'+n+'" value="0"></td><td id='+n+'  data-title="할인가" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n+');" type="number" id="saleprice'+n+'" name="saleprice[]" class="form-control" placeholder="" value="0"><input type="hidden" id="h_saleprice'+n+'" value="0"></td><td id='+n+'  data-title="매입가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="sellprice'+n+'" name="sellprice[]" value="0"><input type="hidden" id="h_sellprice'+n+'" value="0"></td><td id='+n+' data-title="비고" style="text-align: center;vertical-align:middle"><input style="width:100%;" type="text" id="blank'+n+'" name="blank[]" class="form-control" placeholder="" value=""  ></td><td id="del'+n+name+'" data-title="삭제" style="text-align: center;vertical-align:middle"><button type="button" onclick="deleteDiv2('+n+');" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
						
					idx++;
					 n++;
                     last++; 


				 }else{//신규 등록 시 원재료 검색
				     //alert(h_count);
					 $("#explain_list2").hide();

					 $('#add_stock2').append('<tr id='+n2+' style="cursor:default;"><td id="stock_num'+n2+name+'"  data-title="상품번호" style="text-align: center;vertical-align:middle">'+idx2+'<input id="stock_num'+n2+'" type="hidden" name="add_stock_num2[]" value="'+stock_num+'"><input id="index'+n2+'" type="hidden" value="'+index+'"></td><td id="test'+n2+name+'" name="productname" data-title="상품명" style="text-align: center;vertical-align:middle" value="'+name+'">'+name+'<input id="product_name'+n2+'" type="hidden" name="add_name2[]" value="'+name+'"></td><td id="size'+n2+name+'" data-title="중량(g)" style="text-align: center;vertical-align:middle">'+size+'<input id="size'+n2+'" type="hidden" name="add_size2[]" value="'+size+'"></td><td id='+n2+'  data-title="현재 수량" style="text-align: center;vertical-align:middle">'+count+'<input id="allcounttwo'+n2+'" type="hidden" name="add_allcount2[]" value="'+count+'"></td><td id='+n2+'  data-title="수량" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n2+');" type="number" id="counttwo'+n2+'" name="add_count2[]" class="form-control" placeholder="" value="'+purchase_count+'" required><input type="hidden" id="h_count'+n2+'" value="'+purchase_count+'"><input type="hidden" id="h2_count'+n2+'" value=""></td><td id='+n2+'  data-title="원가(원)" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n2+');" type="number" id="oneprice'+n2+'" name="oneprice2[]" class="form-control" placeholder="" value="" required><input id="h_oneprice'+n2+'" type="hidden" name="add_price2[]" value="0"></td><td id='+n2+'  data-title="공급가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="supplyprice'+n2+'" name="supplyprice2[]" value="0"><input type="hidden" id="h_supplyprice'+n2+'" value="0"></td><td id='+n2+'  data-title="부가세" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="tax'+n2+'" name="tax2[]" value="0"><input type="hidden" id="h_tax'+n2+'" value="0"></td><td id='+n2+'  data-title="할인가" style="text-align: center;vertical-align:middle"><input style="width:100%;" onkeyup="supply_price('+n2+');" type="number" id="saleprice'+n2+'" name="saleprice2[]" class="form-control" placeholder="" value="0"><input type="hidden" id="h_saleprice'+n2+'" value="0"></td><td id='+n2+'  data-title="매입가" style="text-align: center;vertical-align:middle"><input type="" style="width:70px;border:none;background:none;text-align: center;" id="sellprice'+n2+'" name="sellprice2[]" value="0"><input type="hidden" id="h_sellprice'+n2+'" value="0"></td><td id='+n2+' data-title="비고" style="text-align: center;vertical-align:middle"><input style="width:100%;" type="text" id="blank'+n2+'" name="blank2[]" class="form-control" placeholder="" value=""  ></td><td id="del'+n2+name+'" data-title="삭제" style="text-align: center;vertical-align:middle"><button type="button" onclick="deleteDiv2('+n2+');" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
	

					 idx2++;
					 n2++;
                     last2++; 
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

function sale_count_func(index_num,ddate){

		 $('#Modal6').modal();
		 //document.getElementById('hh_stock_num').value=stock_num;
		 document.getElementById('sale_index_num').value=index_num;
		// document.getElementById('hh_goods_name').value=goods_name;

		 purchase_index_num=document.getElementById('sale_index_num').value;
}





/*원재료 관리 페이지로 이동*/
function stock_register(){
    
	if (confirm("원재료 관리 페이지로 이동하시겠습니까?") == true){    //확인
    window.location.replace('http://ccit.cafe24.com/CTSMS/information/stock.php');
}else{   //취소
    return;
}
	
}

/*원재료 관리 페이지로 이동*/
function finished_register(){
    
	if (confirm("원재료 관리 페이지로 이동하시겠습니까?") == true){    //확인
    window.location.replace('http://ccit.cafe24.com/CTSMS/information/stock.php');
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