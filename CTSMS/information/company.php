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
  <div class="tit_bdy1">거래처 관리</div>
 
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
                                        <tr style="cursor:default;">
                                            <td data-title="No" style="text-align: center;"><?=$client_data['index_num']?></td>
                                            <td data-title="사업자 번호" style="text-align: center; "><a href="#" style="color:red;" onclick="edit(<?=$client_data['index_num']?>,'<?=$client_data['client_type']?>','<?=$client_data['company_name']?>','<?=$client_data['business_num']?>','<?=$client_data['representative']?>','<?=$client_data['sale_type']?>','<?=$client_data['item']?>','<?=$client_data['tel']?>','<?=$client_data['fax_num']?>','<?=$client_data['address']?>','<?=$client_data['e_mail']?>','<?=$client_data['division']?>');"><?=$client_data['business_num']?></a></td>
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
							

							<div style="float:right; margin-right:10px;"><button  type="button"  data-toggle="modal" data-target="#Modal2" class="btn btn-primary m-t-15 waves-effect">신규 등록</button>
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
			<form id="company_edit" name="company_edit" action="company_edit.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;">
                <div class="modal-content">

                  <!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">거래처 관리</h4>
                  </div>
				  <!-- END Modal header-->

				  <!-- Modal body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
				                
								
								<input type="hidden" id="hidden_index" name="hidden_index" value="">
                               
								
                               
                                <div class="col-md-6">
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line"><strong>사업자 번호</strong>
                                            <input type="text" class="form-control" id="business_num" name="business_num" placeholder=""  maxlength="12" onkeyup='setindustrial_num(this)' readonly>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>거래처 구분</strong>
                                    <select class="form-control show-tick" id="client_type" name="client_type"  >
                                        <option value=""></option>
										<option value="판매/구매">판매/구매</option>
                                        <option value="구매처">구매처</option>
                                        <option value="판매처">판매처</option>
                                    </select>
									</div>
								  </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>거래처명</strong>
                                            <input type="text" id="company_name" name="company_name" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>대표자명</strong>
                                            <input type="text" id="representative" name="representative" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

								 <div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>판매 유형</strong>
                                    <select class="form-control show-tick" id="sale_type" name="sale_type">
                                        <option value=""></option>
                                        <option value="도소매">도소매</option>
                                        <option value="소매">소매</option>
										<option value="도매">도매</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>물품 종류</strong>
                                    <select class="form-control show-tick" id="item" name="item">
                                        <option value=""></option>
                                        <option value="식품류">식품류</option>
										<option value="자재류">자재류</option>
                                    </select>
									</div>
								  </div>
                                </div>


								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>전화번호</strong>
                                            <input type="tel" id="tel" name="tel" class="form-control" placeholder=""  maxlength="11" oninput="maxLengthCheck(this)" required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>팩스</strong>
                                            <input type="text" id="fax_num" name="fax_num" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>주소</strong>
                                            <input type="text" id="address" name="address" class="form-control" placeholder="" >
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>Email</strong>
                                            <input type="text" id="e_mail" name="e_mail" class="form-control" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                              </div>

							 




                  </div>

				 
				  <!-- END Modal body-->

                  <!-- Modal footer-->   
							  <!-- Modal footer-->
							  <div class="modal-footer"><center><button type="submit" name="edit" value="edit" class="btn btn-primary m-t-15 waves-effect">수정</button><span id="company_division" style="margin-left:10px;"></span></center></div>
							  <!-- END Modal footer-->
				  <!-- END Modal footer-->




              </div>
            </div>
            </div>
			<script>
			/*Modal 유효성 검사*/
			function form_check(){
				if($('#client_type').val()==''){
					alert("거래처 구분을 선택해 주세요.");

					return false;
				}
				if($('#sale_type').val()==''){
					alert("판매 유형을 선택해 주세요.");

					return false;
				}
				if($('#item').val()==''){
					alert("물품 종류를 선택해 주세요.");

					return false;
				}
			    
                var email = document.getElementById("e_mail").value;
				if(email!=""){

		        var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

				if(exptext.test(email)==false){

				//이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우			

				alert("이메일형식이 올바르지 않습니다.");

				

				return false;

		        }
				}
				
				

			}
			</script>
			</form>
            <!-- END Modal--> 









			<!-- Modal2 -->
			<form id="company_register" name="company_register" action="company_register.php" method="post" onsubmit="return form_check2();">
            <div class="modal" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal2 header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">거래처 관리</h4>
                  </div>
				  <!-- END Modal2 header-->

				  <!-- Modal2 body-->
                  <div class="modal-body">

                  <div class="row clearfix" style="margin-left:10px; margin-right:10px;">
				                
								
								
                               
								
                               
                                <div class="col-md-6">
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line"><strong>사업자 번호</strong><span style="margin-left:10px; color:#f44336;" id="validate_business_num2"><input type='hidden' id='hidden_validate2'  value=''></span>
                                            <input type="text" class="form-control" id="business_num2" name="business_num2" placeholder=""  maxlength="12" onkeyup='setindustrial_num(this)' required>
                                        </div>
										<span class="input-group-addon">
                                            <button type="button" onclick="validate2()" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;">중복확인</button>
                                        </span>
                                    </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>거래처 구분</strong>
                                    <select class="form-control show-tick" id="client_type2" name="client_type2"  >
                                        <option value=""></option>
										<option value="판매/구매">판매/구매</option>
                                        <option value="구매처">구매처</option>
                                        <option value="판매처">판매처</option>
                                    </select>
									</div>
								  </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>거래처명</strong>
                                            <input type="text" id="company_name2" name="company_name2" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line">대표자명<strong></strong>
                                            <input type="text" id="representative2" name="representative2" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

								 <div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>판매 유형</strong>
                                    <select class="form-control show-tick" id="sale_type2" name="sale_type2">
                                        <option value=""></option>
                                        <option value="도소매">도소매</option>
                                        <option value="소매">소매</option>
										<option value="도매">도매</option>
                                    </select>
									</div>
								  </div>
                                </div>

								<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>물품 종류</strong>
                                    <select class="form-control show-tick" id="item2" name="item2">
                                        <option value=""></option>
                                        <option value="식품류">식품류</option>
										<option value="자재류">자재류</option>
                                    </select>
									</div>
								  </div>
                                </div>


								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>전화번호</strong>
                                            <input type="tel" id="tel2" name="tel2" class="form-control" placeholder=""  maxlength="11" oninput="maxLengthCheck(this)" required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>팩스</strong>
                                            <input type="text" id="fax_num2" name="fax_num2" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>주소</strong>
                                            <input type="text" id="address2" name="address2" class="form-control" placeholder="" >
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>Email</strong>
                                            <input type="text" id="e_mail2" name="e_mail2" class="form-control" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                              </div>

                             


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

          <!-- END Modal2-->
            <script>
			/*Modal2 유효성 검사*/
			function form_check2(){
			


				if($('#client_type2').val()==''){
					alert("거래처 구분을 선택해 주세요.");

					return false;
				}
				if($('#sale_type2').val()==''){
					alert("판매 유형을 선택해 주세요.");

					return false;
				}
				if($('#item2').val()==''){
					alert("물품 종류를 선택해 주세요.");
                     
					return false;
				}
                
				
				var email = document.getElementById("e_mail2").value;
				if(email!=""){

		        var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

				if(exptext.test(email)==false){

				//이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우			

				alert("이메일형식이 올바르지 않습니다.");

				

				return false;

		        }
				}
				

				var hidden_validate = document.getElementById("hidden_validate2").value;
				if(hidden_validate=="불가능" || hidden_validate==""){
					alert("중복 확인을 다시 해주세요.");
					return false;

				}




					
			}
			</script>
			
			</form>
            


<script>


    var count=1;
    /*거래처 수정*/
    function edit(index_num,client,company,business,representative,sale,item,tel,fax,address,email,division){
    


	 $('#Modal').modal();

     


	  document.getElementById("hidden_index").value=index_num;
	 $('#client_type').val(client).prop("selected","true");
	 document.getElementById("company_name").value=company;
	 document.getElementById("business_num").value=business;
	 document.getElementById("representative").value=representative;
	 $('#sale_type').val(sale).prop("selected","true");
	 $('#item').val(item).prop("selected","true");
	 document.getElementById("tel").value=tel;
	 document.getElementById("fax_num").value=fax;
	 document.getElementById("address").value=address;
	 document.getElementById("e_mail").value=email;




    var target="거래처";

      //ajax
	  if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("company_division").innerHTML=xmlhttp.responseText;
   }
   }

  

   xmlhttp.open("POST","division_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("index_num="+index_num+"&target="+target+"&division="+division);


	 
	


   }




/*사용여부 수정*/
function stop(index_num){
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/company_edit.php?index_num='+index_num);
	
}



/*maxlength 체크*/
  function maxLengthCheck(object){
   if (object.value.length > object.maxLength){
    object.value = object.value.slice(0, object.maxLength);
   }    
  }


/*사업자 번호*/
function setindustrial_num(obj) { 
obj.value = obj.value.replace(/[^0-9]/g, ""); 
obj.value = obj.value.replace(/([0-9]{3})-?/, "$1-"); 
obj.value = obj.value.replace(/([0-9]{3})-?([0-9]{2})-?/, "$1-$2-"); 


    

    

} 



/*등록 사업자 번호 확인*/
function validate2(){

	





	var business_num=document.getElementById("business_num2").value;

    
	
    var business=business_num.replace("-", ""); // 문자 '-' 제거
	business=business.replace("-", ""); // 문자 '-' 제거
	

 

    if (business.length==10) //사업자 등록번호가 10자리인가?
    {
        
   

   //ajax
	  if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("validate_business_num2").innerHTML=xmlhttp.responseText;
   }
   }

  

   xmlhttp.open("POST","validation_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("business_num2="+business_num);


     }else{
		

		business_num="no";

		//ajax
	  if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("validate_business_num2").innerHTML=xmlhttp.responseText;
   }
   }

  

   xmlhttp.open("POST","validation_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	 xmlhttp.send("business_num2="+business_num);

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


    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

	<!-- Modal Js -->
    <script src="../js/modal.js"></script>


</body>

</html>