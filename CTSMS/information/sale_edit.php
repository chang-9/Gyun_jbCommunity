
<!-- Modal -->
			<form id="sale_edit" name="sale_edit" action="sale_edit_register.php" method="post" onsubmit="return form_check();">
            <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: auto;" >
                <div class="modal-content" >

				<!-- Modal header-->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">매출 수정</h4>
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
                                            <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="" value="" required>
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

								<!--<div class="col-md-6">
								  <div class="form-group">
								    <div class="form-line"><strong>입고 창고</strong>
                                    <select class="form-control show-tick" id="sale_warehouse" name="sale_warehouse"  >
                                        <option value=""></option>
                                        <option value="한남동">한남동</option>
                                    </select>
									</div>
								  </div>
                                </div>-->

								<div class="col-md-6">
                                    <b>거래처명</b>
                                    <div class="input-group colorpicker colorpicker-element">
                                        <div class="form-line ">
                                            <input type="text" id="sale_company" name="sale_company" class="form-control" value="" readonly>
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" data-toggle="modal" data-target="#Modal5" class="btn btn-primary waves-effect" style="padding: 2px 12px; background-color:#b3b3b3 !important;"><i class="material-icons">search</i></button>
                                        </span>
                                    </div>
                                </div>



								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>비고</strong>
                                            <input type="text" class="form-control" id="sale_blank" name="sale_blank" value="" placeholder="" >
                                        </div>
                                    </div>
                                </div>

								<!--<div class="col-md-6" >
                                    <div class="form-group">
                                        <div class="form-line"><strong>코드</strong>
                                            <input  type="text" id="sale_inout_num" name="sale_inout_num" class="form-control" placeholder="" readonly style="color: #afafaf;">
                                        </div>
                                    </div>
                                </div>-->
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
														<th style="text-align: center;">상품명</th>
														<th style="text-align: center;">중량(g)</th>
														<th style="text-align: center;">주문 수량</th>
														<th style="text-align: center;">원가</th>
														<th style="text-align: center;">현재 수량</th>										<th style="text-align: center;">제조일자</th>			
														<th style="text-align: center;">수량</th>
														<th style="text-align: center;">단가(원)</th>
														<th style="text-align: center;">공급가</th>
														<th style="text-align: center;">부가세</th>
														<th style="text-align: center;">할인가</th>
														<th style="text-align: center;">판매가</th>
														<th style="text-align: center;">마진율(%)</th>
														<th style="text-align: center;">거래구분</th>
														<th style="text-align: center;">출고 상태</th>
														<th style="text-align: center;">비고</th>
														<th style="text-align: center;">삭제</th>
													</tr>
												</thead>
												<tbody id="sale_list">
			
											     
												</tbody>

												
											</table>
									 </div>
								</div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line"><strong>수량 부족한 상품</strong>
										</div>
									</div>
										<div class="table-responsive" id="no-more-tables" style="margin-left:10px; ">
                                  <table class="table table-bordered table-striped " style=" background-color:white;" >
												<thead>
													<tr>                                           
														<th style="text-align: center;">No</th>
														<th style="text-align: center;">상품명</th>
														<th style="text-align: center;">중량(g)</th>	
														<th style="text-align: center;">수량</th>
														<th style="text-align: center;">거래구분</th>
														<th style="text-align: center;">비고</th>
														<!--<th style="text-align: center;">삭제</th>-->
													</tr>
												</thead>
												<tbody id="Insufficient_sale_list">

						
											     
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
									<span><button  type="button" style="margin-left:10px; margin-bottom:10px;"  data-toggle="modal" data-target="#Modal3" class=" btn btn-primary m-t-15 waves-effect" >완제품 품목에서</button></span>
							  <span><button  type="button" style="margin-right:10px; margin-bottom:10px; float:right;"  onclick="finished_register()" class=" btn btn-primary m-t-15 waves-effect" >완제품 등록</button></span>
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
                                    <tbody id="add_stock">
                                     <div>
								  <td colspan="15" id='explain_list'>※ 원재료를 선택하여 추가해 주세요.</td>
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
				    <button type="submit" name="btn_edit" class="btn btn-primary m-t-15 waves-effect">수정</button>
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

			/*수량or단가or할인가 변경 시*/
			function edit_price(i,index_num,a,b,c){


				var i_count=document.getElementById('h_joint_i').value;
				var tmp_goods_name=document.getElementsByName('order_goods_name[]');
				var tmp_index_num=document.getElementsByName('joint_index_num[]');
				//var tmp_date=document.getElementsByName('order_date[]');
				var tmp_current_count=document.getElementsByName('order_current_count[]');
                var test_order_count=0;
				var z="y";
				var test_count=0;
				

				
				

				if(b!="n" ){

					var sale_count=document.getElementById('joint_sale_count'+index_num).value;
					var final_order_count=sale_count;
					var f_sum_current_count=0;
				
					
					for(var k=0; k<i_count; k++){

						var order_goods_name=tmp_goods_name[k].value;//상품명
						var order_index_num=tmp_index_num[k].value;//index_num
						var order_date=tmp_date[k].value;//제조일자
						var order_current_count=tmp_current_count[k].value;//현재 수량

						

						if(order_goods_name==b){

							f_sum_current_count=Number(f_sum_current_count)+Number(order_current_count);

							test_order_count=final_order_count;

                            var final_order_count=Number(final_order_count)-Number(order_current_count);
						    if(Number(final_order_count)>0){
				
								//document.getElementById('joint_original_count'+order_index_num).value=order_current_count;
								document.getElementById('joint_count'+order_index_num).value=order_current_count;

								test_order_count=final_order_count;
								
							}else if(Number(final_order_count)==0){

								//document.getElementById('joint_original_count'+order_index_num).value=order_current_count;
								document.getElementById('joint_count'+order_index_num).value=order_current_count;

								test_order_count=final_order_count;

							}else if(index_num==order_index_num){

								//document.getElementById('joint_original_count'+order_index_num).value=test_order_count;
								document.getElementById('joint_count'+order_index_num).value=test_order_count;

								z="n";

							}else{
                                 if(z=="y"){
								//document.getElementById('joint_original_count'+order_index_num).value=test_order_count;
								document.getElementById('joint_count'+order_index_num).value=test_order_count;

								z="n";
								 }else{
								//document.getElementById('joint_original_count'+order_index_num).value=0;
								document.getElementById('joint_count'+order_index_num).value=0;
								 }

							}
							edit_price(k,order_index_num,"n","n","n");	 
						}

					    
					}

					if(Number(final_order_count)>0){
						

						var i2_count=document.getElementById('h_joint_i2').value;
					
						var tmp_goods_name2=document.getElementsByName('joint_goods_name2[]');
						


						

						for(var ii=0; ii<i2_count; ii++){
						
						

							var order_goods_name2=tmp_goods_name2[ii].value;//상품명
							

							if(order_goods_name2==b){


                                document.getElementById('joint_count2'+ii).value=test_order_count;
							}else{
								//document.getElementById('joint_sale_count'+index_num).value=f_sum_current_count;
								//alert("추가로 등록해 주세요.");
							}

						}


					}else{

						
						var i2_count=document.getElementById('h_joint_i2').value;
					
						var tmp_goods_name2=document.getElementsByName('joint_goods_name2[]');
						


						

						for(var ii=0; ii<i2_count; ii++){
						
						

							var order_goods_name2=tmp_goods_name2[ii].value;//상품명
							

							if(order_goods_name2==b){


                                document.getElementById('joint_count2'+ii).value=0;
							}

						}
					}
				}

				
				
                

			
				var tmp_count=document.getElementsByName('joint_count[]');
				var tmp_cost_price=document.getElementsByName('joint_cost_price[]');
				var tmp_price=document.getElementsByName('joint_price[]');
				var tmp_dc_price=document.getElementsByName('joint_dc_price[]');


				var fixed_original_count=document.getElementById('joint_fixed_original_count'+index_num).value;//고정된 기존 수량
				var sort=document.getElementsByName('joint_sort[]');//매출 구분
				var current_stock=document.getElementById('joint_total_stock'+index_num).innerHTML;//현재 수량
				var count=tmp_count[i].value;//수량
				var cost_price=tmp_cost_price[i].value;//원가
				var price=tmp_price[i].value;//단가
				var dc_price=tmp_dc_price[i].value;//할인가


				
            
				if(Number(current_stock)<Number(count)){


					
					alert("출고 가능한 수량을 초과하였습니다.");
					document.getElementById('joint_count'+index_num).value=fixed_original_count;

				
                }else{
					document.getElementById('joint_count'+index_num).style.color="#555";

					
					
				}



					if(c!="n" ){
					
			
						var order_goods_name3=tmp_goods_name[i].value;
						var tmp_goods_name4=document.getElementById('sp_count_goods_name'+c).value;
						var tmp_sale_count4=document.getElementById('joint_sale_count'+c).value;
						var tmp_origianl_count3=document.getElementsByName('joint_original_count[]');
						var origianl_count3=tmp_origianl_count3[i].value;//기존 수량
						var final_sale_count=0;


							if(tmp_goods_name4==order_goods_name3){


								for(var kk=0; kk<i_count; kk++){

								var order_goods_name=tmp_goods_name[kk].value;//상품명
								var order_index_num=tmp_index_num[kk].value;//index_num
								var order_date=tmp_date[kk].value;//제조일자
								var order_current_count=tmp_current_count[kk].value;//현재 수량
								t_count=tmp_count[kk].value;//수량

									if(order_goods_name==tmp_goods_name4){


											final_sale_count=Number(final_sale_count)+Number(t_count);
											
										

									}
								}

								var i2_count=document.getElementById('h_joint_i2').value;
					
								var tmp_goods_name2=document.getElementsByName('joint_goods_name2[]');
								


								

								for(var ii=0; ii<i2_count; ii++){
								
								

									var order_goods_name2=tmp_goods_name2[ii].value;//상품명
									var order_count2=document.getElementById('joint_count2'+ii).value;
									

									if(order_goods_name2==order_goods_name3){


										final_sale_count=Number(final_sale_count)+Number(order_count2);
									}

								}
								document.getElementById('joint_sale_count'+c).value=final_sale_count;


								  /*tmp_sale_count4=Number(tmp_sale_count4)-Number(origianl_count3)+Number(count);
								 

                                  document.getElementById('joint_sale_count'+c).value=tmp_sale_count4;*/
 
							}
				         }


			


				sort=document.getElementsByName('joint_sort[]');//매출 구분
				current_stock=document.getElementById('joint_total_stock'+index_num).innerHTML;//현재 수량
				count=tmp_count[i].value;//수량
				cost_price=tmp_cost_price[i].value;//원가
				price=tmp_price[i].value;//단가
				dc_price=tmp_dc_price[i].value;//할인가

				


				
		
				var supply_price=count*price;//공급가
				document.getElementById('joint_supply_price'+index_num).innerHTML=supply_price;//공급가 변경
				var tax=supply_price*0.1;//부가세
				document.getElementById('joint_tax'+index_num).innerHTML=tax;//부가세 변경
				var sale_price=(supply_price+tax)-dc_price;//판매가
				document.getElementById('joint_sale_price'+index_num).innerHTML=sale_price;//판매가 변경
				var manic_rate=(Number(price)+Number(price)*0.1-Number(cost_price))/(Number(price)+Number(price)*0.1)*100;//마진율
				manic_rate=manic_rate.toFixed(2);
				document.getElementById('joint_manic_rate'+index_num).innerHTML=manic_rate;//마진율 변경

                
                var sum_count=document.getElementById('joint_sum_count').innerHTML;//총 수량
				var sum_price=document.getElementById('joint_sum_price').innerHTML;//총 단가
				var sum_supply_price=document.getElementById('joint_sum_supply_price').innerHTML;//총 공급가
				var sum_tax=document.getElementById('joint_sum_tax').innerHTML;//총 부가세
				var sum_dc_price=document.getElementById('joint_sum_dc_price').innerHTML;//총 할인가
				var sum_sale_price=document.getElementById('joint_sum_sale_price').innerHTML;//총 판매가
				var return_sale_price=document.getElementById('joint_return_sale_price').innerHTML;
				return_sale_price=return_sale_price.substring(4);//총 반품계
			
                if(a=="y"){//거래구분 변경시
				if(sort[i].value=="반품"){
					document.getElementById('joint_count'+index_num).readOnly = true;
					document.getElementById('joint_price'+index_num).readOnly = true;
					document.getElementById('joint_dc_price'+index_num).readOnly = true;

					document.getElementById('joint_tr'+index_num).style.background="#e66464";

					sum_count=Number(sum_count)-Number(count);
					document.getElementById('h_joint_sum_count').value=sum_count;
					document.getElementById('joint_sum_count').innerHTML=sum_count;//총 수량 변경
					sum_price=Number(sum_price)-Number(price);
					document.getElementById('joint_sum_price').innerHTML=sum_price;//총 단가 변경
					sum_supply_price=Number(sum_supply_price)-Number(supply_price);
					document.getElementById('joint_sum_supply_price').innerHTML=sum_supply_price;//총 공급가 변경
					sum_tax=Number(sum_tax)-Number(tax);
					document.getElementById('joint_sum_tax').innerHTML=sum_tax;//총 부가세 변경
					sum_dc_price=Number(sum_dc_price)-Number(dc_price);
					document.getElementById('h_joint_sum_dc_price').value=sum_dc_price;
					document.getElementById('joint_sum_dc_price').innerHTML=sum_dc_price;//총 할인가 변경
					sum_sale_price=Number(sum_sale_price)-Number(sale_price);
					document.getElementById('h_joint_sum_sale_price').value=sum_sale_price;
					document.getElementById('joint_sum_sale_price').innerHTML=sum_sale_price;//총 판매가 변경
					return_sale_price=Number(return_sale_price)+Number(sale_price);
					document.getElementById('h_joint_sum_return_sale_price').value=return_sale_price;
					document.getElementById('joint_return_sale_price').innerHTML="반품계:"+return_sale_price;//총 반품계 변경
					document.getElementById('joint_id_state'+index_num).value="";
					document.getElementById('joint_state'+index_num).innerHTML="";//출고 상태 변경
				}else{
					document.getElementById('joint_count'+index_num).readOnly = false;
					document.getElementById('joint_price'+index_num).readOnly = false;
					document.getElementById('joint_dc_price'+index_num).readOnly = false;
					document.getElementById('joint_tr'+index_num).style.background="white";

					sum_count=Number(sum_count)+Number(count);
					document.getElementById('h_joint_sum_count').value=sum_count;
					document.getElementById('joint_sum_count').innerHTML=sum_count;//총 수량 변경
					sum_price=Number(sum_price)+Number(price);
					document.getElementById('joint_sum_price').innerHTML=sum_price;//총 단가 변경
					sum_supply_price=Number(sum_supply_price)+Number(supply_price);
					document.getElementById('joint_sum_supply_price').innerHTML=sum_supply_price;//총 공급가 변경
					sum_tax=Number(sum_tax)+Number(tax);
					document.getElementById('joint_sum_tax').innerHTML=sum_tax;//총 부가세 변경
					sum_dc_price=Number(sum_dc_price)+Number(dc_price);
					document.getElementById('h_joint_sum_dc_price').value=sum_dc_price;
					document.getElementById('joint_sum_dc_price').innerHTML=sum_dc_price;//총 할인가 변경
					sum_sale_price=Number(sum_sale_price)+Number(sale_price);
					document.getElementById('h_joint_sum_sale_price').value=sum_sale_price;
					document.getElementById('joint_sum_sale_price').innerHTML=sum_sale_price;//총 판매가 변경
					return_sale_price=Number(return_sale_price)-Number(sale_price);
					document.getElementById('h_joint_sum_return_sale_price').value=return_sale_price;
					document.getElementById('joint_return_sale_price').innerHTML="반품계:"+return_sale_price;//총 반품계 변경
					document.getElementById('joint_id_state'+index_num).value="출고 예정";
					document.getElementById('joint_state'+index_num).innerHTML="출고 예정";//출고 상태 변경
				}
				}else{

					if(sort[i].value=="반품"){
						var tmp_origianl_sale_price=document.getElementsByName('joint_original_sale_price[]');
						var origianl_sale_price=tmp_origianl_sale_price[i].value;//기존 판매가
						return_sale_price=Number(return_sale_price)+Number(sale_price)-Number(origianl_sale_price);
						document.getElementById('joint_original_sale_price'+index_num).value=sale_price;
						document.getElementById('h_joint_sum_return_sale_price').value=return_sale_price;
						document.getElementById('joint_return_sale_price').innerHTML="반품계:"+return_sale_price;//총 반품계 변경
					
					}else{
						
					   
						var tmp_origianl_count=document.getElementsByName('joint_original_count[]');
						var origianl_count=tmp_origianl_count[i].value;//기존 수량
						
						sum_count=Number(sum_count)+Number(count)-Number(origianl_count);					
						document.getElementById('joint_original_count'+index_num).value=count;
						document.getElementById('h_joint_sum_count').value=sum_count;
						document.getElementById('joint_sum_count').innerHTML=sum_count;//총 수량 변경
						

						var tmp_origianl_price=document.getElementsByName('joint_original_price[]');
						var origianl_price=tmp_origianl_price[i].value;//기존 단가
						sum_price=Number(sum_price)+Number(price)-Number(origianl_price);
						document.getElementById('joint_original_price'+index_num).value=price;
						document.getElementById('joint_sum_price').innerHTML=sum_price;//총 단가 변경

						var tmp_origianl_supply_price=document.getElementsByName('joint_original_supply_price[]');
						var origianl_supply_price=tmp_origianl_supply_price[i].value;//기존 공급가
						sum_supply_price=Number(sum_supply_price)+Number(supply_price)-Number(origianl_supply_price);
						document.getElementById('joint_original_supply_price'+index_num).value=supply_price;
						document.getElementById('joint_sum_supply_price').innerHTML=sum_supply_price;//총 공급가 변경

						var tmp_origianl_tax=document.getElementsByName('joint_original_tax[]');
						var origianl_tax=tmp_origianl_tax[i].value;//기존 부가세
						sum_tax=Number(sum_tax)+Number(tax)-Number(origianl_tax);
						document.getElementById('joint_original_tax'+index_num).value=tax;
						document.getElementById('joint_sum_tax').innerHTML=sum_tax;//총 부가세 변경

						var tmp_origianl_dc_price=document.getElementsByName('joint_original_dc_price[]');
						var origianl_dc_price=tmp_origianl_dc_price[i].value;//기존 할인가
						sum_dc_price=Number(sum_dc_price)+Number(dc_price)-Number(origianl_dc_price);
						document.getElementById('joint_original_dc_price'+index_num).value=dc_price;
						document.getElementById('h_joint_sum_dc_price').value=sum_dc_price;
						document.getElementById('joint_sum_dc_price').innerHTML=sum_dc_price;//총 할인가 변경

						var tmp_origianl_sale_price=document.getElementsByName('joint_original_sale_price[]');
						var origianl_sale_price=tmp_origianl_sale_price[i].value;//기존 판매가
						sum_sale_price=Number(sum_sale_price)+Number(sale_price)-Number(origianl_sale_price);
						document.getElementById('joint_original_sale_price'+index_num).value=sale_price;
						document.getElementById('h_joint_sum_sale_price').value=sum_sale_price;
						document.getElementById('joint_sum_sale_price').innerHTML=sum_sale_price;//총 판매가 변경
			
					
						
					}

				}
				

				

				
				
			}

			function edit_price2(i,index_num,a){

				var sort=document.getElementsByName('joint_sort2[]');//매출 구분

				if(a=="y"){//거래구분 변경시
				if(sort[i].value=="반품"){
					

					document.getElementById('joint2_tr'+index_num).style.background="#e66464";

					
				}else{
					
					document.getElementById('joint2_tr'+index_num).style.background="white";

					
				}
				}

			}

			function deleteDiv_sort(i,index_num,sort,stock_index) {
						var sum_count=document.getElementById('joint_sum_count').innerHTML;//총 수량
						var sum_price=document.getElementById('joint_sum_price').innerHTML;//총 단가
						var sum_supply_price=document.getElementById('joint_sum_supply_price').innerHTML;//총 공급가
						var sum_tax=document.getElementById('joint_sum_tax').innerHTML;//총 부가세
						var sum_dc_price=document.getElementById('joint_sum_dc_price').innerHTML;//총 할인가
						var sum_sale_price=document.getElementById('joint_sum_sale_price').innerHTML;//총 판매가
						var return_sale_price=document.getElementById('joint_return_sale_price').innerHTML;
						return_sale_price=return_sale_price.substring(4);//총 반품계


						var fixed_count=document.getElementById('joint_fixed_original_count'+index_num).value;//고정된 기존 수량
						var fixed_dc_price=document.getElementById('joint_fixed_original_dc_price'+index_num).value;//고정된 기존 할인가
						var fixed_sale_price=document.getElementById('joint_fixed_original_sale_price'+index_num).value;//고정된 기존 판매가



						 var h_index_num=document.getElementById("hidden_index").value;
						 var h_manager=document.getElementById("sale_manager").value;
						 var h_date=document.getElementById("sale_date").value;
						 var h_company=document.getElementById("sale_company").value;
						 var h_blank=document.getElementById("sale_blank").value;

					

				if (confirm("정말 삭제하시겠습니까??") == true){    //확인

				        if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
							
							
						   }else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

							
						   }

						   xmlhttp.onreadystatechange=function(){
						   if (xmlhttp.readyState==4 && xmlhttp.status==200){

                        if(sort=="반품"){


						var fixed_original_sale_price=document.getElementById('joint_fixed_original_sale_price'+index_num).value;//고정된 기존 판매가
						return_sale_price=Number(return_sale_price)-Number(fixed_original_sale_price);
						document.getElementById('h_joint_sum_return_sale_price').value=return_sale_price;
						document.getElementById('joint_return_sale_price').innerHTML="반품계:"+return_sale_price;//총 반품계 변경

						edit(h_index_num,h_manager,h_date,h_company,h_blank);


						}else{
						


				        var fixed_original_count=document.getElementById('joint_fixed_original_count'+index_num).value;//고정된 기존 수량
						sum_count=Number(sum_count)-Number(fixed_original_count);	
						document.getElementById('h_joint_sum_count').value=sum_count;
						document.getElementById('joint_sum_count').innerHTML=sum_count;//총 수량 변경
						
						
						var fixed_original_price=document.getElementById('joint_fixed_original_price'+index_num).value;//고정된 기존 단가
						sum_price=Number(sum_price)-Number(fixed_original_price);
						document.getElementById('joint_sum_price').innerHTML=sum_price;//총 단가 변경
						

						var fixed_original_supply_price=document.getElementById('joint_fixed_original_supply_price'+index_num).value;//고정된 기존 공급가
						sum_supply_price=Number(sum_supply_price)-Number(fixed_original_supply_price);
						document.getElementById('joint_sum_supply_price').innerHTML=sum_supply_price;//총 공급가 변경

						var fixed_original_tax=document.getElementById('joint_fixed_original_tax'+index_num).value;//고정된 기존 부가세
						sum_tax=Number(sum_tax)-Number(fixed_original_tax);
						document.getElementById('joint_sum_tax').innerHTML=sum_tax;//총 부가세 변경

						var fixed_original_dc_price=document.getElementById('joint_fixed_original_dc_price'+index_num).value;//고정된 기존 할인가
						sum_dc_price=Number(sum_dc_price)-Number(fixed_original_dc_price);
						document.getElementById('h_joint_sum_dc_price').value=sum_dc_price;
						document.getElementById('joint_sum_dc_price').innerHTML=sum_dc_price;//총 할인가 변경

						var fixed_original_sale_price=document.getElementById('joint_fixed_original_sale_price'+index_num).value;//고정된 기존 판매가
						sum_sale_price=Number(sum_sale_price)-Number(fixed_original_sale_price);
						document.getElementById('h_joint_sum_sale_price').value=sum_sale_price;
						document.getElementById('joint_sum_sale_price').innerHTML=sum_sale_price;//총 판매가 변경

						edit(h_index_num,h_manager,h_date,h_company,h_blank);

						}
					

				
				        $("#joint_tr"+index_num).remove();

						   }
						   }


						   xmlhttp.open("POST","sale_ajax.php",true);
						   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						   xmlhttp.send("delete_num="+index_num+"&delete_sort="+sort+"&delete_stock_index="+stock_index+"&delete_fixed_count="+fixed_count+"&delete_fixed_dc_price="+fixed_dc_price+"&delete_fixed_sale_price="+fixed_sale_price);

					    


				}else{   //취소
					
					return;
				}


 
				        
				 
				

			}

			function deleteDiv_sort2(index_num){
				if (confirm("정말 삭제하시겠습니까??") == true){    //확인


					 if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
							
							
						   }else{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

							
						   }

						   xmlhttp.onreadystatechange=function(){
						   if (xmlhttp.readyState==4 && xmlhttp.status==200){


				           $("#joint2_tr"+index_num).remove();

						   }
						   }


						   xmlhttp.open("POST","sale_ajax.php",true);
						   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						   xmlhttp.send("delete_num2="+index_num);



					
					}else{   //취소
					
					return;
				}
			}



			</script>
			</form>
            <!-- END Modal-->










			<script>
			/* 수정*/
    function edit(index_num,manager,date,company,blank){
    
	
	 $('#Modal').modal();

     

	 document.getElementById("hidden_index").value=index_num;
	 //document.getElementById("sale_inout_num").value=inout_num;
	 document.getElementById("sale_manager").value=manager;
	 document.getElementById("sale_date").value=date;
	 document.getElementById("sale_company").value=company;
	 //document.getElementById("sale_warehouse").value=warehouse;
	 document.getElementById("hidden_sale_search").value="수정";
	  document.getElementById("hidden_company_search").value="수정";
	 //document.getElementById("origin_total_count").value=total_count;
	 //document.getElementById("origin_price").value=price;
	 document.getElementById("sale_blank").value=blank;


	 



	 if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
	xmlhttp2=new XMLHttpRequest();
	
	
   }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
	
	
   }

   xmlhttp.onreadystatechange=function(){
   if (xmlhttp.readyState==4 && xmlhttp.status==200){
   document.getElementById("sale_list").innerHTML=xmlhttp.responseText;
   }
   }

   xmlhttp2.onreadystatechange=function(){
   if (xmlhttp2.readyState==4 && xmlhttp2.status==200){
   document.getElementById("Insufficient_sale_list").innerHTML=xmlhttp2.responseText;
   }
   }



   xmlhttp.open("POST","sale_ajax.php",true);
   xmlhttp2.open("POST","sale_ajax.php",true);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xmlhttp.send("index_num="+index_num);
   xmlhttp2.send("index_num2="+index_num);

   }
			</script>