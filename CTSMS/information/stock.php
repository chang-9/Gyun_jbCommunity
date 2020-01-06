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
	</style>




 



</head>



<body class="theme-red">

<?include("../header.php");?>

<?include("../mysql.php");?>

<!--원재료 리스트-->
<?
/*stock 테이블*/
$stock_query="SELECT *
              FROM stock
			  WHERE sort not like '완제품' AND sort not like '세트제품'
              ORDER BY index_num DESC";
$stock_result=mysqli_query($conn,$stock_query);
?>
<form id="frm" name="frm"  method="post" action="stock_edit.php">
<section class="content">
<div class="deep">
  <div class="tit_bdy1">원재료 관리</div>
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
											<th style="text-align: center;">거래처명</th>
											<th style="text-align: center;">사용 구분</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									while($stock_data=mysqli_fetch_array($stock_result)){
									?>
                                        <tr style="cursor:default;">
                                            <td data-title="No" style="text-align: center;"><?=$stock_data['index_num']?></td>
                                            <td data-title="상품명" style="text-align: center; "><a href="#" style="color:red;" onclick="edit(<?=$stock_data['index_num']?>,'<?=$stock_data['goods_brand']?>','<?=$stock_data['sort']?>','<?=$stock_data['goods_name']?>',<?=$stock_data['goods_size']?>,'<?=$stock_data['supply_company']?>','<?=$stock_data['division']?>');"><?=$stock_data['goods_name']?></a></td>
                                            <td data-title="구분" style="text-align: center;"><?=$stock_data['sort']?></td>
                                            <td data-title="중량(g)" style="text-align: center;"><?=$stock_data['goods_size']?></td>
											<td data-title="거래처명" style="text-align: center;"><?=$stock_data['supply_company']?></td>
											<td data-title="사용 구분" style="text-align: center;"><?=$stock_data['division']?></td>
                                        </tr>
									<?
							        }
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
							
                            
							<div style="float:right; margin-right:10px;"><button  type="button"  data-toggle="modal" data-target="#Modal2" class="btn btn-primary m-t-15 waves-effect">신규 등록</button>
							</div><div style="float:right; margin-right:10px;" ><button onclick="printPage()" type="button"  class="btn btn-primary m-t-15 waves-effect">바코드 출력</button>
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
<!--END 원재료 리스트-->





            <!-- Modal -->
			<form id="stock_edit" name="stock_edit" action="stock_edit.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;">
                <div class="modal-content">


				<!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">원재료 관리</h4>
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

					/*client 테이블*/
					$client_query2="SELECT *
								  FROM client";
					$client_result2=mysqli_query($conn,$client_query2);
					?>

	
								<!-- new-->
								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>브랜드</strong>
                                    <select class="form-control show-tick" id="goods_brand" name="goods_brand"  >
                                        <option value=""></option>
                                        <option value="DFT">DFT</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>구분</strong>
                                    <select class="form-control show-tick" id="sort" name="sort"  >
                                        <option value=""></option>
                                        <option value="패키지">패키지</option>
										<option value="내포장 상품">내포장 상품</option>
										<option value="배송용품">배송용품</option>
										<option value="기타 상품">기타 상품</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>상품명</strong>
                                            <input type="text" class="form-control" id="goods_name" name="goods_name" placeholder="" required>
                                        </div>
                                    </div>
                                </div>


								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>중량(g)</strong>
                                            <input type="number" id="goods_size" name="goods_size" class="form-control" placeholder=""   required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <b>거래처명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="supply_company" name="supply_company" class="form-control" value="" required readonly>
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal3" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons">search</i></button>
                                        </span>
                                    </div>
                                </div>



                                

 								<!-- END new--> 
                               
								
                                 

                              </div>

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
														<th style="text-align: center;">제조일자</th>
														<th style="text-align: center;">원가</th>
														<th style="text-align: center;">단가</th>
														<th style="text-align: center;">재고량</th>
														<th style="text-align: center;">비고</th>
														<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="stock_list">
											     
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
							  <div class="col-sm-12">
								<div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                  <table class="table table-bordered table-striped " style="width=100%; background-color:white;" >
												<thead>
													<tr>                                           
														<th style="text-align: center;">No</th>
														<th style="text-align: center;">제조일자</th>
														<th style="text-align: center;">원가</th>
														<th style="text-align: center;">단가</th>
														<th style="text-align: center;">재고량</th>
														<th style="text-align: center;">비고</th>
														<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="add_stock">
											     <td colspan="7" id="explain_list">※제조일자 별로 추가 작성해 주세요.</td>
												</tbody>
												<td colspan="7" ><center><button type="button" onclick="stock_write()" class="btn btn-primary m-t-15 waves-effect">추가</button></center></td>
											</table>
									 </div>
								</div>
									<!--END content2-->   
                                    </p>									
                                </div>
                                
                                
                            </div>
							</div>





							  


							  


                             





                  </div>

				 
				  <!-- END Modal body-->

                  <!-- Modal footer-->
				  <div class="modal-footer"><center><button type="submit" name="edit" value="edit" class="btn btn-primary m-t-15 waves-effect">수정</button><span id="stock_division" style="margin-left:10px;"></span></center></div>
				  <!-- END Modal footer-->

              


              </div>
            </div>
            </div>
			<script>
			/*Modal 유효성 검사*/
			function form_check2(){
				if($('#goods_brand').val()==''){
					alert("브랜드를 선택해 주세요.");

					return false;
				}
				if($('#sort').val()==''){
					alert("구분을 선택해 주세요.");

					return false;
				}

			}
			</script>
			</form>
            <!-- END Modal-->





            <!-- Modal2 -->
			<form id="stock_register" name="stock_register" action="stock_register.php" method="post" onsubmit="return form_check2();">
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal2 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">원재료 관리</h4>
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
				

					/*client 테이블*/
					$client_query="SELECT *
								  FROM client";
					$client_result=mysqli_query($conn,$client_query);
					?>

					
                    <input type="hidden" id="hidden_end_index" value="<?=$end_index_num2?>">
								
								<!-- content1-->
								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>브랜드</strong>
                                    <select class="form-control show-tick" id="goods_brand2" name="goods_brand2"  >
                                        <option value=""></option>
                                        <option value="DFT">DFT</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>구분</strong>
                                    <select class="form-control show-tick" id="sort2" name="sort2"  >
                                        <option value=""></option>
                                        <option value="패키지">패키지</option>
										<option value="내포장 상품">내포장 상품</option>
										<option value="배송용품">배송용품</option>
										<option value="기타 상품">기타 상품</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>상품명</strong>
                                            <input type="text" class="form-control" id="goods_name2" name="goods_name2" placeholder="" required>
                                        </div>
                                    </div>
                                </div>



								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>중량(g)</strong>
                                            <input type="number" id="goods_size2" name="goods_size2" class="form-control" placeholder=""   required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <b>거래처명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="supply_company2" name="supply_company2" class="form-control" value="" required readonly>
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal3" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons" onclick="hidden_change()">search</i></button>
                                        </span>
                                    </div>
                                </div>																
								<!-- END content1--> 




								
                               
								
                                 

                              </div>


							  <!--content2-->
							  <div class="col-sm-12" class="table-responsive" id="no-more-tables">
								<div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                  <table class="table table-bordered table-striped " style="width=100%; background-color:white;" >
												<thead>
													<tr>                                           
														<th style="text-align: center;">No</th>
														<th style="text-align: center;">제조일자</th>
														<th style="text-align: center;">원가</th>
														<th style="text-align: center;">단가</th>
														<th style="text-align: center;">재고량</th>
														<th style="text-align: center;">비고</th>
														<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="add_stock2">
											     <td colspan="7" id="explain_list2">※제조일자 별로 추가 작성해 주세요.</td>
												</tbody>
												<td colspan="7" ><center><button type="button" onclick="stock_write2()" class="btn btn-primary m-t-15 waves-effect">추가</button></center></td>
											</table>
									 </div>
								</div>
									<!--END content2-->




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
				if($('#goods_brand2').val()==''){
					alert("브랜드를 선택해 주세요.");

					return false;
				}
				if($('#sort2').val()==''){
					alert("구분을 선택해 주세요.");

					return false;
				}				

			}



			function hidden_change(){
			    document.getElementById("hidden_company_search").value="등록";
			}
			</script>
			</form>
            <!-- END Modal2-->




			<!-- Modal3  거래처검색-->
            <div class="modal" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

            <!-- Modal3 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">거래처 검색</h4>
                  </div>
              <!-- END Modal3 header-->

              <!-- Modal3 body-->
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

             
              <!-- END Modal3 body-->

                  <!-- Modal3 footer-->   
                  <div class="modal-footer">   
              
                  </div>
              <!-- END Modal3 footer--> 


              </div>
            </div>
            </div>

			<script>
			/*거래처 선택*/
			function company_sel(company_name){
				 var hidden_value=document.getElementById("hidden_company_search").value;

				 if(hidden_value=="수정"){//수정 시 거래처 검색

					 document.getElementById("supply_company").value=company_name;

					 $('#Modal3').modal('toggle');//모달 닫기
					 $('.modal-backdrop').hide();//모달 fade 제거

				 }else{//신규 등록 시 거래처 검색
                    
					document.getElementById("supply_company2").value=company_name;

					 $('#Modal3').modal('toggle');//모달 닫기
					 //$('.modal-backdrop').hide();//모달 fade 제거

				 }
			}
			</script>
            <!-- END Modal3-->





           

            








<script>



    var count=1;
 /*원재료 수정*/
    function edit(index_num,brand,sort,name,size,company,division){

	


	 $('#Modal').modal();


	   document.getElementById("hidden_index").value=index_num;
	 $('#goods_brand').val(brand).prop("selected","true");
	 $('#sort').val(sort).prop("selected","true");
	 document.getElementById("goods_name").value=name;
	 document.getElementById("goods_size").value=size;
	 $('#supply_company').val(company).prop("selected","true");


	 document.getElementById("hidden_company_search").value="수정";
	 


    var target="원재료";
	  
    
    if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	xmlhttp2=new XMLHttpRequest();
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("stock_division").innerHTML=xmlhttp.responseText;
   }
   }

     xmlhttp2.onreadystatechange=function(){
   if (xmlhttp2.readyState==4 && xmlhttp2.status==200){
   document.getElementById("stock_list").innerHTML=xmlhttp2.responseText;
   }
   }

  

   xmlhttp.open("POST","division_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("index_num="+index_num+"&target="+target+"&division="+division);


	 xmlhttp2.open("POST","stock_ajax.php",true);
   xmlhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp2.send("index_num="+index_num);

	  
   }



   /*사용여부 수정*/
function stop(index_num){
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/stock_edit.php?index_num='+index_num);
	
}



  /*바코드 출력*/
function printPage(){

    window.open("http://ccit.cafe24.com/CTSMS/information/stock_barcode.php", "", "width=1000, height=800, left=50, top=40, scrollbars=1");
}
            





			var n=1;    
			var last=1;
			/*원재료 제조일자 별로 추가 작성*/
			function stock_write(){
				 
					 $("#explain_list").hide();

					 var hidden_index=document.getElementById("hidden_index").value;
                    
					
                     $('#add_stock').append('<tr id='+n+' style="cursor:default;"><td id='+n+' data-title="No" style="text-align: center;">'+n+'</td><td id='+n+' data-title="제조일자" style="text-align: center;"><input type="date" class="form-control"   name="goods_date[]" placeholder="" required></td><td id='+n+'  data-title="원가" style="text-align: center;"><input type="number" class="form-control"  name="cost_price[]" placeholder="" required></td><td id='+n+'  data-title="단가" style="text-align: center;"><input type="number" class="form-control"  name="goods_price[]" placeholder="" required></td><td id='+n+' data-title="재고량" style="text-align: center;"><input type="number" class="form-control"  name="goods_total[]" placeholder="" value="0" readonly></td><td id='+n+' data-title="비고" style="text-align: center;"><input type="text" class="form-control"  name="goods_blank[]" placeholder="" ></td><td id='+n+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv('+n+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
						
					 n++;
					 last++;
                     
					

				 
			}

            /*원재료 제조일자 별로 추가 작성 삭제*/
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



  

            var n2=1;    
			var last2=1;
			/*원재료 제조일자 별로 추가 작성*/
			function stock_write2(){
				 
					 $("#explain_list2").hide();

					 var hidden_end_index=document.getElementById("hidden_end_index").value;
                    
					
                     $('#add_stock2').append('<tr id='+n2+' style="cursor:default;"><td id='+n2+' data-title="No" style="text-align: center;">'+n2+'</td><td id='+n2+' data-title="제조일자" style="text-align: center;"><input type="date" class="form-control"   name="goods_date2[]" placeholder="" required></td><td id='+n2+'  data-title="원가" style="text-align: center;"><input type="number" class="form-control"  name="cost_price2[]" placeholder="" required></td><td id='+n2+'  data-title="단가" style="text-align: center;"><input type="number" class="form-control"  name="goods_price2[]" placeholder="" required></td><td id='+n2+' data-title="재고량" style="text-align: center;"><input type="number" class="form-control"  name="goods_total2[]" placeholder="" value="0" readonly></td><td id='+n2+' data-title="비고" style="text-align: center;"><input type="text" class="form-control"  name="goods_blank2[]" placeholder="" ></td><td id='+n2+' data-title="삭제" style="text-align: center;"><button type="button" onclick="deleteDiv2('+n2+')" class="btn btn-primary m-t-15 waves-effect">삭제</button></td></tr>');
						
					 n2++;
					 last2++;
                     
					

				 
			}

            /*원재료 제조일자 별로 추가 작성 삭제*/
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

            
			
			/*원재료 삭제*/
			function deleteDiv3(obj) {
     			var no = obj;



				if (confirm("정말 삭제하시겠습니까??") == true){    //확인

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
			
			  

			   xmlhttp.open("POST","stock_ajax.php",true);
			   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				 xmlhttp.send("delete_num="+no);


				
				$("#joint_"+no).remove();

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

	<!--  -->
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

	<!-- JsBarcode Js -->
	<script type="text/javascript" src="../js/JsBarcode.ean-upc.min.js"></script>



</body>

</html>