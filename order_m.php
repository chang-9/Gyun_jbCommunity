<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_password = "autoset";  
$DB_name = "stock";
$conn = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>주문 및 재고 관리 시스템</title>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<link href="./css/css.css" rel="stylesheet">
<link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<link href="./dist/css/sb-admin-2.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./semantic/semantic.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./js/common.js"></script>
<link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="./js/bootstrap-datepicker.kr.js" charset="UTF-8"></script>

<script type='text/javascript'>
    $(function(){
        $('.input-group.date').datepicker({
            calendarWeeks: false,
            todayHighlight: true,
            autoclose: true,
            format: "yyyy/mm/dd",
            language: "kr"
        });
    });
</script>
</head>
<body>
    <?include("header.php");?>
<?
include("mysql.php");

$manager_id=$_SESSION["id"];//작업자 아이디

$membership_query="SELECT *
                   FROM membership
				   WHERE id='$manager_id'";
$membership_result = mysqli_query($conn, $membership_query);
$membership_data=mysqli_fetch_array($membership_result);
$manager_name=$membership_data['name'];//작업자 이름

?>
    <div id="wrapper">
        <!-- Navigation -->
        <div id="jhheader">
        </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="mid_info" style="width: 100%; margin-bottom: 20px; margin-top: 0px;">
                            </div>
                            <br>
                            <div>
                                <form class = "ui form" id = "sheet_form" style="font-size: 1.5rem; width: 100%; margin-bottom: 200px;"> 
                                    <h4 class="ui dividing header" style="font-size: 1.7rem;">상품발주 입력</h4><br>
                                    <div style="width:600px; float:left;">
                                        <div class="field">
                                            <label>발주일자</label>
                                                <div class="field">
                                                     <div class="input-group date">
                                                    <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                     </div>
                                                </div>
                                        </div>
                                    
                                    


                                        <div class="field">
                                            <label style="margin-top: 15px">발주 번호</label>
                                            <input id="in_out_num" type="text" value="<?=$in_out_num?>" name="in_out_num" class="form-control"  readonly required>
                                        
                                        </div>
                                    <div style="margin-top: 10px">  
                                        <a style="color: #ff0000; ">* 발주번호는 자동으로 생성됩니다.<br></a>
                                    </div>
                                    
                                    
                                        <div class="field">
                                            <label style="margin-top: 15px">거래처</label>
                                            <div class="input-group">
                                                <input type="text" name="client_name" class="form-control" readonly >
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                            </div>
                                        </div>
                                    
                                    <div class="field">
                                           <label style="margin-top: 15px">담당자</label>
                                                <div class="field">
                                                    <input type="text" name="worker_name">
                                                </div>
                                        </div>
                                    
                                    <div class="field">
                                             <label style="margin-top: 15px">납기일자</label>
                                                <div class="field">
                                                     <div class="input-group date">
                                                    <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                     </div>
                                                </div>
                                        </div>
                                    
                                    </div>
                                    
                                    <div  style="display: inline-block; margin-left: 70px; width:600px;" >
                                        <div class="field">
                                            <label>발주 금액</label>
                                            <input type="text" name="order_no" value="30000"readonly >
                                        </div>
                                        
                                        <div class="field">
                                            <label>발주서 비고</label>
                                            <div class="input-group">
                                                <input type="text" name="order_some" style="height:150px;" readonly><span class="input-group-addon" href="#" onclick="window.open('/order_mcli.php','mcli', 'width=650, height=500'); return false;"><i class="glyphicon glyphicon-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                        
                                </form>
                                
                                
                               <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" style="margin-top: 30px;">
                                   <div class="row">
                                       <div class="col-sm-6">
                                           <div class="dataTables_length" id="dataTables-example_length">
                                               <label>Show <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                                       <option value="10">10</option>
                                                       <option value="25">25</option>
                                                       <option value="50">50</option>
                                                       <option value="100">100</option>
                                                   </select> entries</label>
                                           </div>
                                       </div>
                                       <div class="col-sm-6">
                                           <div id="dataTables-example_filter" class="dataTables_filter">
                                               <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-12">
                                           <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">  
                                <thead>
                                    <tr role="row">
                                        <th style="text-align: center; width: 14px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending">
                                            <input type="checkbox" id="checkall">
                                        </th>
                                        <th style="text-align: center; width: 14px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending">No.</th>
                                        <th style="text-align: center; width: 84px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="품명: activate to sort column ascending">품명</th>
                                        <th style="text-align: center; width: 30px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="단위: activate to sort column ascending">단위</th>
                                        <th style="text-align: center; width: 20px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="수량: activate to sort column ascending">수량</th>
                                        <th style="text-align: center; width: 30px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="단가: activate to sort column ascending">단가</th>
                                        <th style="text-align: center; width: 30px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="금액: activate to sort column ascending">금액</th>
                                        <th style="text-align: center; width: 30px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="세액: activate to sort column ascending">세액</th>
                                        <th style="text-align: center; width: 84px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="비고: activate to sort column ascending">비고</th>
                                    </tr>
                                </thead>
                                <tbody>


<tr role="row" class="odd">
    <td style="text-align: center;"><input type="checkbox" name="chk"></td>
    <td align="center" class="sorting_1"> 1 </td>
    <td align="center"><a href="#" onclick="window.open('spreadsheet.php?orderNo=p2m01709271530063786','Spreadsheet', 'width=1500, height=800'); return false;"> PREMIUM 참치 육포 50g 5개 묶음+선택 1개 증정 [5+1] 외 1 건</a></td>
    <td align="center"> box </td>
    <td align="center">2</td>
    <td align="center"> 30000 </td>
    <td align="center">60000</td>
    <td align="center"> 6000 </td>
    <td align="center"> 없음 </td>
</tr>
<tr role="row" class="even">
    <td style="text-align: center;"><input type="checkbox" name="chk"></td>
    <td align="center" class="sorting_1"> 2 </td>
    <td align="center"> <a href="#" onclick="window.open('spreadsheet.php?orderNo=p5m01706231005012423','Spreadsheet', 'width=1500, height=800'); return false;">[정기배송] Premium Gift II for Tiny(10%할인/배송포함)</a> </td>
    <td align="center"> ex(12) </td>
    <td align="center">4</td>
    <td align="center"> 30000 </td>
    <td align="center"> 120000</td>
    <td align="center"> 12000 </td>
    <td align="center"> 없음 </td>
</tr>

                                </tbody>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-6">
                                           <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div>
                                               
                                       </div>
                                       <div class="col-sm-6">
                                           <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                               <ul class="pagination">
                                                   <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
                                                       <a href="#">Previous</a>
                                                   </li>
                                                   <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
                                                       <a href="#">1</a>
                                                   </li>
                                                   <li class="paginate_button next disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                                                       <a href="#">Next</a>
                                                   </li>
                                               </ul>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                            
                            
                                
                                
                            </div>
                           
                            
                            

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="./vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="./semantic/semantic.min.js"></script> -->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dat