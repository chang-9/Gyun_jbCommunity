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
	
	</style>




</head>



<body class="theme-red">



<?include("../header.php");?>

<?include("../mysql.php");?>

<!--완제품 리스트-->
<?
/*stock 테이블*/
$stock_query="SELECT *
              FROM stock
			  WHERE sort like '완제품' AND division like '사용' 
              ORDER BY index_num DESC";
$stock_result=mysqli_query($conn,$stock_query);
?>
<form id="frm" name="frm"  method="post" action="">
<section class="content">
<div class="deep">
  <div class="tit_bdy1">완제품 BOM 관리</div>
        <div class="container-fluid">
            <div class="block-header" >





			<div class="row clearfix" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">                      
                        <div class="body">
                            <div class="row clearfix">


							<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color: rgba(255, 255, 255, 0.6);" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">상품명</th>                                          
                                            <th style="text-align: center;">구분</th>
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">사용 구분</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($stock_data=mysqli_fetch_array($stock_result)){
									?>
                                        <tr style="cursor:default;">
                                            <td data-title="No" style="text-align: center;"><?=$stock_data['index_num']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;" onclick="edit(<?=$stock_data['index_num']?>,'<?=$stock_data['sort']?>','<?=$stock_data['goods_name']?>',<?=$stock_data['goods_size']?>,'<?=$stock_data['division']?>');"><?=$stock_data['goods_name']?></a></td>
                                            <td data-title="구분" style="text-align: center;"><?=$stock_data['sort']?></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$stock_data['goods_size']?></td>
											<td data-title="사용 구분" style="text-align: center;"><?=$stock_data['division']?></td>
                                        </tr>
									<?
							        }
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
							
                            
							<div style="float:right; margin-right:10px;"><button  type="button"   data-toggle="modal" data-target="#Modal2" class="btn btn-primary m-t-15 waves-effect">신규 등록</button>
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
<!--END 완제품 리스트-->


            <!-- Modal -->
			<form id="finished_bom_edit" name="finished_bom_edit" action="finished_product_bom_edit.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;">
                <div class="modal-content">


				<!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">완제품 BOM 관리</h4>
                  </div>
				  <!-- END Modal header-->

				  <!-- Modal body-->
                  <div class="modal-body">

                  

				  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">


                  <input type="hidden" id="hidden_index" name="hidden_index" value="">

				  <?
                   /*stock 테이블 index_num 맨끝 번호*/
					$stock_num_info="SELECT index_num
								 FROM stock
								 ORDER BY index_num DESC
								 ";
					$stock_num_info_result=mysqli_query($conn,$stock_num_info);
					$stock_num = mysqli_fetch_array($stock_num_info_result);

					$end_index_num=$stock_num['index_num']+1;				

					
					?>


                  
								
								
								<input type="hidden" id="goods_index_num" name="goods_index_num" value="">
								
								<!-- new-->	
								
								
	
							

								<div class="col-md-6">
                                    <b>상품명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="goods_name" name="goods_name" class="form-control" value=""   required readonly>
                                        </div>
                                        <!--<span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal3" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons" >search</i></button>
                                        </span>-->
                                    </div>
                                </div>
								<!-- END new--> 
                               
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
														<th style="text-align: center;">상품번호</th>
														<th style="text-align: center;">브랜드</th>
														<th style="text-align: center;">구분</th>
														<th style="text-align: center;">상품명</th>
														<th style="text-align: center;">중량(g)</th>
														<th style="text-align: center;">소요량</th>
														<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="finished_list">
											     
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
									<button  type="button" style="margin-left:10px;"  data-toggle="modal" data-target="#Modal4" class=" btn btn-primary m-t-15 waves-effect" >원재료 품목에서</button>
							  <div class="body" style="margin-right: 0px; margin-left: 0px;">


                            <div class="table-responsive col-sm-12" id="no-more-tables">
                                <table class='table table-striped table-bordered' >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">상품번호</th>
											<th style="text-align: center;">브랜드</th>
											<th style="text-align: center;">구분</th>
                                            <th style="text-align: center;">상품명</th>                                          
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">소요량</th>
											<th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_stock">
                                     <div>
								  <td colspan="9" id='explain_list'>※ 원재료를 선택하여 추가해 주세요.</td>
								  </div>
                                    </tbody>
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
				  <button type="submit" name="edit" value="edit" class="btn btn-primary m-t-15 waves-effect">수정</button>
				  <button type="button" name="del" value="del" onclick="bom_del()" class="btn btn-primary m-t-15 waves-effect">삭제</button>
				  </center>
				  </div>
				  <!-- END Modal footer-->

              


              </div>
            </div>
            </div>
			<script>
			/*Modal 유효성 검사*/
			function form_check2(){
				

			}
			</script>
			</form>
            <!-- END Modal-->




            <!-- Modal2 -->
			<form id="finished_bom_register" name="finished_bom_register" action="finished_product_bom_register.php" method="post" onsubmit="return form_check2();">
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal2 header-->
                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>

                    <h4 class="modal-title" id="myModalLabel">완제품 BOM 관리</h4>
                  </div>
				  <!-- END Modal2 header-->

				  <!-- Modal2 body-->
				  
                  <div class="modal-body">



                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
                  
				  
							    
				  <?


				    /*stock 테이블 index_num 맨끝 번호*/
					$stock_num_info2="SELECT index_num
								 FROM stock
								 ORDER BY index_num DESC
								 ";
					$stock_num_info_result2=mysqli_query($conn,$stock_num_info2);
					$stock_num2 = mysqli_fetch_array($stock_num_info_result2);

					$end_index_num2=$stock_num2['index_num']+1;					
				

					
					?>

					
                                
							    <input type="hidden" id="goods_index_num2" name="goods_index_num2" value="">
								
								<!-- new-->	
								<div class="col-sm-12">
								<button type="button" style="float:right; margin-bottom:20px;" onclick="finished_register()"  class="btn btn-primary waves-effect">완제품 등록</button>
								</div>
								
	
							

								<div class="col-md-6">
                                    <b>상품명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="goods_name2" name="goods_name2" class="form-control" value=""   required readonly>
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal3" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons" onclick="hidden_change()">search</i></button>
                                        </span>
                                    </div>
                                </div>


								

								

								
								<!-- END new-->
							
                              <hr width="100%" style="    border-top-color:rgb(158, 158, 158);">
							  <span><button  type="button" style="margin-left:10px; margin-bottom:10px;"  data-toggle="modal" data-target="#Modal4" class=" btn btn-primary m-t-15 waves-effect" >원재료 품목에서</button></span>
							  <span><button  type="button" style="margin-right:10px; margin-bottom:10px;float:right;"  onclick="stock_register()" class=" btn btn-primary m-t-15 waves-effect" >원재료 등록</button></span>

								
                                 

                              </div>

                    <!---->									
					<div class="body" style="margin-right: 0px; margin-left: 0px;">


                            <div class="table-responsive col-sm-12" id="no-more-tables">
                                <table class='table table-striped table-bordered' >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">상품번호</th>
											<th style="text-align: center;">브랜드</th>
											<th style="text-align: center;">구분</th>
                                            <th style="text-align: center;">상품명</th>                                          
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">소요량</th>
											<th style="text-align: center;">삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add_stock2">
                                     <div>
								  <td colspan="9" id='explain_list2'>※ 원재료를 선택하여 추가해 주세요.</td>
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
					if(document.getElementById("goods_index_num2").value==""){
						alert("상품명을 검색하여 입력해 주세요.");
						return false;
					}		

			}


		    function hidden_change(){
				document.getElementById("hidden_finished_search").value="등록";
			}


			</script>
			</form>
            <!-- END Modal2-->












			<!-- Modal3  완제품검색-->
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
              
			      <input type="hidden" id="hidden_finished_search" value="">
                        
                  <!--content-->

				  <?
					/*stock 테이블*/
					$finished_product_query="SELECT *
								  FROM stock
								  WHERE sort='완제품' AND division='사용 안함' ";
					$finished_product_result=mysqli_query($conn,$finished_product_query);
					?>

					<!-- list-->
					<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">상품명</th>
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">개요</th>
											<th style="text-align: center;">선택</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($finished_product_data=mysqli_fetch_array($finished_product_result)){
									?>
                                        <tr style="cursor:default;">
                                         <td data-title="No" style="text-align: center;"><?=$finished_product_data['index_num']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;" ><?=$finished_product_data['goods_name']?></a></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$finished_product_data['goods_size']?></td>
											<td data-title="개요" style="text-align: center;"><?=$finished_product_data['outline']?></td>
											<td data-title="선택" style="text-align: center;"><button type="button" onclick="finished_product_sel(<?=$finished_product_data['index_num']?>,'<?=$finished_product_data['goods_name']?>');")" class="btn btn-primary waves-effect">선택</button></td>

                                        </tr>
									<?
							        }
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					
					<!-- list-->




                  <!--END content-->
                               
                        
                                 

                   </div>


                  </div>

             
              <!-- END Modal3 body-->

                  <!-- Modal3 footer-->   
                  <div class="modal-footer">   
              
                  </div>
              <!-- END Modal3 footer--> 


              </div>
            </div>
            </div>

			<script>
			/*완제품 선택*/
			function finished_product_sel(index_num,name){
				 var hidden_value=document.getElementById("hidden_finished_search").value;
                
				 if(hidden_value=="수정"){//수정 시 완제품 검색

                      
					 document.getElementById("goods_index_num").value=index_num;
					 document.getElementById("goods_name").value=name;

					 

					 $('#Modal3').modal('toggle');//모달 닫기
					 //$('.modal-backdrop').hide();//모달 fade 제거

				 }else{//신규 등록 시 완제품 검색
					 
                    
                     document.getElementById("goods_index_num2").value=index_num;
					 document.getElementById("goods_name2").value=name;

						
					 $('#Modal3').modal('toggle');//모달 닫기
					// $('.modal-backdrop').hide();//모달 fade 제거
					 

				 }
			}
			</script>
            <!-- END Modal3-->




            



			<!-- Modal4 원재료 검색-->
            <div class="modal" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal4 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">원재료 검색</h4>
                  </div>
              <!-- END Modal4 header-->

              <!-- Modal4 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
              
			      <input type="hidden" id="hidden_stock_search" value="">
                        
                  <!--content-->

				  <?
					/*stock 테이블*/
					$stock_search_query="SELECT *
                          FROM stock                        
                          WHERE sort not like '완제품' AND sort not like '세트제품' AND division like '사용'
                          ORDER BY index_num DESC";
					$stock_search_result=mysqli_query($conn,$stock_search_query);
					?>

					<!-- list-->
					<div class="body">
                            <div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width=100%; background-color:white;" >
                                    <thead>
                                        <tr>                                           
                                            <th style="text-align: center;">상품번호</th>
                                            <th style="text-align: center;">상품명</th>                                          
                                            <th style="text-align: center;">구분</th>
                                            <th style="text-align: center;">중량(g)</th>
											<th style="text-align: center;">선택</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($stock_search_data=mysqli_fetch_array($stock_search_result)){
									?>
                                        <tr style="cursor:default;">
                                            <td data-title="상품번호" style="text-align: center;"><?=$stock_search_data['index_num']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;"><?=$stock_search_data['goods_name']?></a></td>
                                            <td data-title="구분" style="text-align: center;"><?=$stock_search_data['sort']?></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$stock_search_data['goods_size']?></td>							
											<td data-title="선택" style="text-align: center;"><button type="button" id="click_before_btn2" onclick="stock_search_sel(<?=$stock_search_data['index_num']?>,'<?=$stock_search_data['goods_brand']?>','<?=$stock_search_data['sort']?>','<?=$stock_search_data['goods_name']?>',<?=$stock_search_data['goods_size']?>)" class="btn btn-primary waves-effect">선택</button></td>
                                        </tr>
									<?
							        }
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					
					<!-- list-->




                  <!--END content-->
                               
                        
                                 

                   </div>


                  </div>

             
              <!-- END Modal4 body-->

                  <!-- Modal4 footer-->   
                  <div class="modal-footer">   
                   <center>					
				    <button type="button" onclick="close_modal4()" class="btn btn-primary m-t-15 waves-effect">완료</button>
					</center>
                  </div>
              <!-- END Modal4 footer--> 


              </div>
            </div>
            </div>

			<script>
		


			var n=1;
            var last=1;
			var n2=1;
            var last2=1;
			/*원재료 선택*/
			function stock_search_sel(stock_num,brand,sort,name,size){
				 var hidden_value=document.getElementById("hidden_finished_search").value;
				 showNotification('',name);
				 

				 if(hidden_value=="수정"){//수정 시 원재료 검색

					 $("#explain_list").hide();

					  $('#add_stock').append('<tr id='+n+' style="cursor:default;"><td id='+n+'  data-title="상품번호" style="text-align: center;">'+stock_num+'</td><td id='+n+'  data-title="브랜드" style="text-align: center;">'+brand+'</td><td id='+n+'  data-title="구분" style="text-align: center;">'+sort+'</td><td id='+n+' data-title="상품명" style="text-align: center;">'+name+'</td><td id='+n+' data-title="중량(g)" style="text-align: center;">'+size+'</td><td id='+n+'  data-title="소요량" style="text-align: center;"><input type="number" id='+n+' name="add_count[]" class="form-control" placeholder="" value="1"  required></td><td id='+n+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv('+n+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td><input id='+n+' type="hidden" name="add_stock_num[]" value="'+stock_num+'"><input id='+n+' type="hidden" name="add_brand[]" value="'+brand+'"><input id='+n+' type="hidden" name="add_sort[]" value="'+sort+'"><input id='+n+' type="hidden" name="add_name[]" value="'+name+'"><input id='+n+' type="hidden" name="add_size[]" value="'+size+'"></tr>');
						
					 n++;
                     last++; 

					

				 }else{//신규 등록 시 원재료 검색
					 
					 
					 $("#explain_list2").hide();
                    
					
                     $('#add_stock2').append('<tr id='+n2+' style="cursor:default;"><td id='+n2+'  data-title="상품번호" style="text-align: center;">'+stock_num+'</td><td id='+n2+'  data-title="브랜드" style="text-align: center;">'+brand+'</td><td id='+n2+'  data-title="구분" style="text-align: center;">'+sort+'</td><td id='+n2+' data-title="상품명" style="text-align: center;">'+name+'</td><td id='+n2+' data-title="중량(g)" style="text-align: center;">'+size+'</td><td id='+n2+'  data-title="소요량" style="text-align: center;"><input type="number" id='+n2+' name="add_count2[]" class="form-control" placeholder="" value="1"  required></td><td id='+n2+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv2('+n2+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td><input id='+n2+' type="hidden" name="add_stock_num2[]" value="'+stock_num+'"><input id='+n2+' type="hidden" name="add_brand2[]" value="'+brand+'"><input id='+n2+' type="hidden" name="add_sort2[]" value="'+sort+'"><input id='+n2+' type="hidden" name="add_name2[]" value="'+name+'"><input id='+n2+' type="hidden" name="add_size2[]" value="'+size+'"></tr>');
						
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
					}
				}

			}

			function close_modal4(){
				$('#Modal4').modal('toggle');//모달 닫기
				$('.modal-backdrop').hide();//모달 fade 제거

			}
			</script>
            <!-- END Modal4-->


















<script>
 







/*완제품 수정*/
    function edit(index_num,sort,name,size,division){
    


	 $('#Modal').modal();
	


	 document.getElementById("hidden_index").value=index_num;	
	 document.getElementById("goods_name").value=name; 
	 document.getElementById("hidden_finished_search").value="수정";




	 if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("finished_list").innerHTML=xmlhttp.responseText;
   }
   }

   

  

   xmlhttp.open("POST","finished_product_bom_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("index_num="+index_num);
	 

   }



/*바코드 생성
function create_barcode(end_index_num,type){
    
	var index_num=end_index_num.toString();
	var hidden_index_num=document.getElementById("hidden_index").value.toString();


    if(document.getElementById("sort").value!="" && document.getElementById("goods_date").value!="" && type=="edit"){
		
	var sort=document.getElementById("sort").value;
	var goods_date=document.getElementById("goods_date").value;

    //국가번호+sort
	if(sort=="완제품"){
		sort="8802";
	}
    
	//hidden_index_num
	if(hidden_index_num<10){
		hidden_index_num="0"+hidden_index_num;
	}

	//제조일자
	var year=goods_date.substr(2,2);
	var month=goods_date.substr(5,2);
	var day=goods_date.substr(8,2);
	var date=year+month+day;

	var barcode=sort+hidden_index_num+date;

    document.getElementById("barcode_num").value=barcode;
	}else if(type=="edit"){
		alert("구분과 제조일자를 입력해 주세요.");
	}else{
	}







	if(document.getElementById("sort2").value!="" && document.getElementById("goods_date2").value!="" && type=="register"){
	var sort2=document.getElementById("sort2").value;
	var goods_date2=document.getElementById("goods_date2").value;

    //국가번호+sort
	if(sort2=="완제품"){
		sort2="8802";
	}

	//제조일자
	var year2=goods_date2.substr(2,2);
	var month2=goods_date2.substr(5,2);
	var day2=goods_date2.substr(8,2);
	var date2=year2+month2+day2;

	var barcode2=sort2+index_num+date2;

    document.getElementById("barcode_num2").value=barcode2;
	}else if(type=="register"){
		alert("구분과 제조일자를 입력해 주세요.");
	}else{
	}




	
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




           /*원재료 삭제*/
			function deleteDiv3(obj) {
     			var no = obj;
				



				if (confirm("정말 삭제하시겠습니까?") == true){    //확인

					if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				
			   }else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				
			   }

			   xmlhttp.onreadystatechange=function(){
			   if (xmlhttp.readyState==4 && xmlhttp.status==200){
			   document.getElementById("stock_delete").innerHTML=xmlhttp.responseText;
			   }
			   }
			
			  

			   xmlhttp.open("POST","finished_product_bom_ajax.php",true);
			   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				 xmlhttp.send("delete_num="+no);


				
				$("#composition_"+no).remove();

				}else{   //취소
					return;
				}			
              
			}

 
            /*bom 삭제*/
			function bom_del(){
				var hidden_index=document.getElementById("hidden_index").value;
				
				if (confirm("정말 삭제하시겠습니까?") == true){//확인
				window.location.replace('http://ccit.cafe24.com/CTSMS/create/finished_product_bom_del.php?index_num='+hidden_index);
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
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Jquery Validation Plugin Css -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

	
    <!-- JQuery Steps Plugin Js -->
    <script src="../plugins/jquery-steps/jquery.steps.js"></script>

	<!-- Sweet Alert Plugin Js -->
	<script src="../plugins/sweetalert/sweetalert.min.js"></script>

	<!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

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
	<script src="../js/pages/ui/notifications.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

	<!-- Modal Js -->
    <script src="../js/modal.js"></script>



</body>
</html>