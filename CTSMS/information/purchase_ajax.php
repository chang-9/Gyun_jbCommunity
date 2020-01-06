<?
include("../mysql.php");

if($_POST[index_num]){

$index_num=$_POST[index_num];

	/*stock_sp_joint 테이블*/
$stock_sp_joint_query="SELECT *
              FROM stock_sp_joint
			  WHERE sp_index=$index_num AND del_state NOT LIKE 'y' AND count NOT LIKE 0
              ORDER BY goods_name DESC, date ASC, index_num ASC";
$stock_sp_joint_result=mysqli_query($conn,$stock_sp_joint_query);


?>

<?
$i=0;//순서
$sum_count=0;//총 수량
$sum_price=0;//총 합계
$sum_supply_price=0;//총 공급가
$sum_tax=0;//총 부가세
$sum_dc_price=0;//총 할인가
$sum_sale_price=0;//총 판매가
$sum_return_count=0;//총 반품 수량
$sum_return_price=0;//총 반품 합계
$sum_return_supply_price=0;//총 반품 공급가
$sum_return_tax=0;//총 반품 부가세
$sum_return_dc_price=0;//총 반품 할인가
$sum_return_sale_price=0;//총 반품 판매가
$tmp_name="";
$tmp_cnt=1;

while($stock_sp_joint_data=mysqli_fetch_array($stock_sp_joint_result)){
	$stock_index=$stock_sp_joint_data['stock_index'];

	$stock_joint_query="SELECT *
	                    FROM stock_joint
						WHERE stock_num=$stock_index ";
	$stock_joint_result=mysqli_query($conn,$stock_joint_query);
	$stock_joint_data=mysqli_fetch_array($stock_joint_result);
    

    if($stock_sp_joint_data['sort']=="매입"){ 
	    $current_stock=$stock_sp_joint_data['count']+($stock_joint_data['total_stock']-$stock_joint_data['state_count']);
    }else{
		$current_stock=$stock_joint_data['total_stock']-$stock_joint_data['state_count'];
	}


	$count=$stock_sp_joint_data['count'];//수량
	//$cost_price=$stock_sp_joint_data['cost_price'];//원가
	$price=$stock_sp_joint_data['price'];//단가
    $supply_price=$count*$price;//공급가
	$tax=$supply_price*0.1;//부가세
	$dc_price=$stock_sp_joint_data['dc_price'];//할인가
	$sale_price=($supply_price+$tax)-$dc_price;//판매가
	//$manic_rate=round(($price+$price*0.1-$cost_price)/($price+$price*0.1)*100,2);//마진율
    
	$goods_name=$stock_sp_joint_data['goods_name'];

    $query="SELECT *
	        FROM stock_sp_joint
			WHERE goods_name='$goods_name' AND sp_index=$index_num AND state LIKE '%입고%' AND del_state NOT LIKE 'y' AND count NOT LIKE 0";
	$result=mysqli_query($conn,$query);
	$data=mysqli_num_rows($result);
	$tmp_cnt=$data;


	$query2="SELECT *
	        FROM stock_sp_count
			WHERE name='$goods_name' AND sp_index=$index_num";
	$result2=mysqli_query($conn,$query2);
	$data2=mysqli_fetch_array($result2);


	$order_count=$data2['count'];

 


?>
<tr id='joint_tr<?=$stock_sp_joint_data['index_num'];?>' style="cursor:default; background-color:<?if($stock_sp_joint_data['sort']=="반품"){echo '#e66464';}?>">
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="No" style="text-align: center;"><?=$stock_sp_joint_data['index_num'];?>
<input type="hidden" name="joint_index_num[]" value="<?=$stock_sp_joint_data['index_num'];?>">
</td>
<?
if($tmp_name!=$stock_sp_joint_data['goods_name']){
?>
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="상품명" style="text-align: center;" rowspan="<?=$tmp_cnt;?>">
<?=$stock_sp_joint_data['goods_name'];?>
</td>
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="중량(g)" style="text-align: center;" rowspan="<?=$tmp_cnt;?>">
<?=$stock_sp_joint_data['size'];?>
</td>

<input type="hidden" class="form-control" onkeyup="edit_price(<?=$i?>,<?=$stock_sp_joint_data['index_num'];?>,'n','<?=$stock_sp_joint_data['goods_name'];?>','n');" id="joint_sale_count<?=$stock_sp_joint_data['index_num'];?>" name="joint_sale_count[]" value="<?=$data2['count'];?>">
<input type="hidden" class="form-control" id="sp_count_index_num<?=$stock_sp_joint_data['index_num'];?>" name="sp_count_index_num[]" value="<?=$data2['index_num'];?>">
<input type="hidden" class="form-control" id="sp_count_goods_name<?=$stock_sp_joint_data['index_num'];?>"  value="<?=$stock_sp_joint_data['goods_name'];?>">

<?
$tmp_index_num=$stock_sp_joint_data['index_num'];
$tmp_name=$stock_sp_joint_data['goods_name'];
}else{
?>
<?
}
?>
<input type="hidden" class="form-control"  name="order_goods_name[]" value="<?=$stock_sp_joint_data['goods_name'];?>">
<input type="hidden" class="form-control"  name="order_date[]" value="<?=$stock_sp_joint_data['date'];?>">
<input type="hidden" class="form-control"  name="order_current_count[]" value="<?=$current_stock;?>">
<input type="hidden" class="form-control"  name="order_count[]" value="<?=$order_count;?>">


<td id='joint_total_stock<?=$stock_sp_joint_data['index_num'];?>' data-title="현재 수량" style="text-align: center;">
<?=$current_stock;?>
</td>
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="수량" style="text-align: center;">
<input type="text" class="form-control" onkeyup="edit_price(<?=$i?>,<?=$stock_sp_joint_data['index_num'];?>,'n','n',<?=$tmp_index_num;?>);" id='joint_count<?=$stock_sp_joint_data['index_num'];?>' name="joint_count[]" placeholder="" value="<?=$stock_sp_joint_data['count'];?>" style="color:<?if($stock_joint_data['total_stock']<$stock_sp_joint_data['count']){}?>" <?if($stock_sp_joint_data['sort']=="반품"){echo 'readonly';}?> required>
<input type="hidden" id="joint_original_count<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_count[]" value="<?=$stock_sp_joint_data['count'];?>">
<input type="hidden" id="joint_fixed_original_count<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_count[]" value="<?=$stock_sp_joint_data['count'];?>">
</td>
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>'  data-title="단가" style="text-align: center;">
<input type="text" class="form-control" onkeyup="edit_price(<?=$i?>,<?=$stock_sp_joint_data['index_num'];?>,'n','n','n');" id='joint_price<?=$stock_sp_joint_data['index_num'];?>' name="joint_price[]" placeholder="" value="<?=$stock_sp_joint_data['price'];?>" <?if($stock_sp_joint_data['sort']=="반품"){echo 'readonly';}?> required>
<input type="hidden" id="joint_original_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_price[]" value="<?=$stock_sp_joint_data['price'];?>" >
<input type="hidden" id="joint_fixed_original_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_price[]" value="<?=$stock_sp_joint_data['price'];?>">
</td>
<td id='joint_supply_price<?=$stock_sp_joint_data['index_num'];?>'  data-title="공급가" style="text-align: center;">
<?=$supply_price?>
</td>
<input type="hidden" id="joint_original_supply_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_supply_price[]" value="<?=$supply_price;?>">
<input type="hidden" id="joint_fixed_original_supply_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_supply_price[]" value="<?=$supply_price?>">
<td id='joint_tax<?=$stock_sp_joint_data['index_num'];?>'  data-title="부가세" style="text-align: center;">
<?=$tax?>
</td>
<input type="hidden" id="joint_original_tax<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_tax[]" value="<?=$tax;?>">
<input type="hidden" id="joint_fixed_original_tax<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_tax[]" value="<?=$tax?>">
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>'  data-title="할인가" style="text-align: center;">
<input type="text" class="form-control" onkeyup="edit_price(<?=$i?>,<?=$stock_sp_joint_data['index_num'];?>,'n','n','n');" id="joint_dc_price<?=$stock_sp_joint_data['index_num'];?>"  name="joint_dc_price[]" placeholder="" value="<?=$stock_sp_joint_data['dc_price'];?>" <?if($stock_sp_joint_data['sort']=="반품"){echo 'readonly';}?> required>
<input type="hidden" id="joint_original_dc_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_dc_price[]" value="<?=$stock_sp_joint_data['dc_price'];?>">
<input type="hidden" id="joint_fixed_original_dc_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_dc_price[]" value="<?=$stock_sp_joint_data['dc_price'];?>">
</td>
<td id='joint_sale_price<?=$stock_sp_joint_data['index_num'];?>'  data-title="판매가" style="text-align: center;">
<?=$sale_price?>
</td>
<input type="hidden" id="joint_original_sale_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_original_sale_price[]" value="<?=$sale_price;?>">
<input type="hidden" id="joint_fixed_original_sale_price<?=$stock_sp_joint_data['index_num'];?>" name="joint_fixed_original_sale_price[]" value="<?=$sale_price;?>">

<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="비고" style="text-align: center;">
<input type="text" class="form-control"  name="joint_blank[]" placeholder="" value="<?=$stock_sp_joint_data['blank'];?>" >
</td>
<td id='joint_<?=$stock_sp_joint_data['index_num'];?>' data-title="삭제" style="text-align: center;">
<button type="button" onclick="deleteDiv_sort(<?=$i?>,<?=$stock_sp_joint_data['index_num'];?>,'<?=$stock_sp_joint_data['sort'];?>',<?=$stock_sp_joint_data['stock_index'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
</td>
</tr>
<input type="hidden" class="form-control" id="joint_id_state<?=$stock_sp_joint_data['index_num'];?>"  name="joint_state[]" placeholder="" value="<?=$stock_sp_joint_data['state'];?>" >
<?

	$sum_count=$sum_count+$stock_sp_joint_data['count'];
	$sum_price=$sum_price+$stock_sp_joint_data['price'];
	$sum_supply_price=$sum_supply_price+$supply_price;
	$sum_tax=$sum_tax+$tax;
	$sum_dc_price=$sum_dc_price+$stock_sp_joint_data['dc_price'];
	$sum_sale_price=$sum_sale_price+$sale_price;

if($stock_sp_joint_data['sort']=="반품"){
	$sum_return_count=$sum_return_count+$stock_sp_joint_data['count'];
	$sum_return_price=$sum_return_price+$stock_sp_joint_data['price'];
	$sum_return_supply_price=$sum_return_supply_price+$supply_price;
    $sum_return_tax=$sum_return_tax+$tax;
	$sum_return_dc_price=$sum_return_dc_price+$stock_sp_joint_data['dc_price'];
    $sum_return_sale_price=$sum_return_sale_price+$sale_price;
}

$i++;
}
	$sum_count=$sum_count-$sum_return_count;
	$sum_price=$sum_price-$sum_return_price;
	$sum_supply_price=$sum_supply_price-$sum_return_supply_price;
	$sum_tax=$sum_tax-$sum_return_tax;
	$sum_dc_price=$sum_dc_price-$sum_return_dc_price;
	$sum_sale_price=$sum_sale_price-$sum_return_sale_price;
?>

<tr>                                           
	<th style="text-align: center;">합계</th>
	<th style="text-align: center;"></th>
	<th style="text-align: center;"></th>
	<th style="text-align: center;"></th>
	<th style="text-align: center;" id='joint_sum_count'><?=$sum_count?></th>
	<th style="text-align: center;" id='joint_sum_price'><?=$sum_price?></th>
	<th style="text-align: center;" id='joint_sum_supply_price'><?=$sum_supply_price?></th>
	<th style="text-align: center;" id='joint_sum_tax'><?=$sum_tax?></th>
	<th style="text-align: center;" id='joint_sum_dc_price'><?=$sum_dc_price?></th>
	<th style="text-align: center;" id='joint_sum_sale_price'><?=$sum_sale_price?></th>
	<th style="text-align: center;" id='joint_return_sale_price' ></th>
	<th style="text-align: center;"></th>

</tr>


<input type="hidden" id="h_joint_i" name="h_joint_i" value="<?=$i?>">
<input type="hidden" id="h_joint_sum_count" name="h_joint_sum_count" value="<?=$sum_count?>">
<input type="hidden" id="h_joint_sum_sale_price" name="h_joint_sum_sale_price" value="<?=$sum_sale_price?>">
<input type="hidden" id="h_joint_sum_return_sale_price" name="h_joint_sum_return_sale_price" value="<?=$sum_return_sale_price?>">
<input type="hidden" id="h_joint_sum_dc_price" name="h_joint_sum_dc_price" value="<?=$sum_dc_price?>">

<?
}
?>
<?
if($_POST['index_num2']){
	$index_num=$_POST['index_num2'];

	/*stock_sp_joint 테이블*/
	$stock_sp_joint_query2="SELECT *
						  FROM stock_sp_joint
						  WHERE sp_index=$index_num AND state LIKE '재고량 부족' AND del_state NOT LIKE 'y' AND count NOT LIKE 0
						  ORDER BY index_num ASC";
	$stock_sp_joint_result2=mysqli_query($conn,$stock_sp_joint_query2);

	$i2=0;
	while($stock_sp_joint_data2=mysqli_fetch_array($stock_sp_joint_result2)){
	?>
		<tr id='joint2_tr<?=$stock_sp_joint_data2['index_num'];?>' style="cursor:default; background-color:<?if($stock_sp_joint_data2['sort']=="반품"){echo '#e66464';}?>">
		<td id='joint2_<?=$stock_sp_joint_data2['index_num'];?>' data-title="No" style="text-align: center;"><?=$stock_sp_joint_data2['index_num'];?>
		<input type="hidden" name="joint_index_num2[]" value="<?=$stock_sp_joint_data2['index_num'];?>">
		</td>
		<td id='joint2_<?=$stock_sp_joint_data2['index_num'];?>' data-title="상품명" style="text-align: center;"><?=$stock_sp_joint_data2['goods_name'];?>
		<input type="hidden" name="joint_goods_name2[]" value="<?=$stock_sp_joint_data2['goods_name'];?>">
		</td>
		<td id='joint2_<?=$stock_sp_joint_data2['index_num'];?>' data-title="중량(g)" style="text-align: center;"><?=$stock_sp_joint_data2['size'];?>
		<input type="hidden" name="joint_size2[]" value="<?=$stock_sp_joint_data2['size'];?>">
		</td>
		<td id='joint2_<?=$stock_sp_joint_data2['index_num'];?>' data-title="수량" style="text-align: center;">
		<input type="text" class="form-control" id="joint_count2<?=$i2;?>" name="joint_count2[]" value="<?=$stock_sp_joint_data2['count'];?>" readonly>
		</td>
		<td id='joint2_<?=$stock_sp_joint_data['index_num'];?>'  data-title="거래구분" style="text-align: center; ">
		<select class="form-control show-tick"  onchange="edit_price2(<?=$i2?>,<?=$stock_sp_joint_data2['index_num'];?>,'y');" name="joint_sort2[]" style="width:100px;"><option value="매입" <?if($stock_sp_joint_data2['sort']=="매입"){echo "selected";}?>>매입</option><option value="반품" <?if($stock_sp_joint_data2['sort']=="반품"){echo "selected";}?>>반품</option></select>
		</td>
		<td id='joint2_<?=$stock_sp_joint_data2['index_num'];?>' data-title="비고" style="text-align: center;">
		<input class="form-control" type="text" name="joint_blank2[]" value="<?=$stock_sp_joint_data2['blank'];?>">
		</td>
		<!--<td id='joint_<?=$stock_sp_joint_data2['index_num'];?>' data-title="삭제" style="text-align: center;">
		<button type="button" onclick="deleteDiv_sort2(<?=$stock_sp_joint_data2['index_num'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
		</td>-->
<?
$i2++;
}
?>
<input type="hidden" id="h_joint_i2" value="<?=$i2;?>">
<?
}
?>

<?
if($_POST['delete_num']){

	$delete_num=$_POST['delete_num'];
	$sort=$_POST['delete_sort'];
	$stock_index=$_POST['delete_stock_index'];
	$fixed_count=$_POST['delete_fixed_count'];
	$fixed_dc_price=$_POST['delete_fixed_dc_price'];
	$fixed_sale_price=$_POST['delete_fixed_sale_price'];

	$query="SELECT *
	        FROM stock_sp
		    WHERE index_num=$delete_num";
    $result=mysqli_query($conn,$query);
	$data=mysqli_fetch_array($result);

	$stock_count=$data['stock_count'];
	$total_price=$data['total_price'];
	$return_price=$data['return_price'];
	$dc_price=$data['dc_price'];

	$sum_count=$stock_count-$fixed_count;
	$sum_total_price=$total_price-$fixed_sale_price;
	$sum_dc_price=$dc_price-$fixed_dc_price;
	$sum_return_price=$return_price-$fixed_count;
   
	if($sort=="매입"){
		$stock_joint_query="SELECT *
	                        FROM stock_joint  
						    WHERE stock_num=$stock_index";
		$stock_joint_result=mysqli_query($conn,$stock_joint_query);
		$stock_joint_data=mysqli_fetch_array($stock_joint_result);
		$state_count=$stock_joint_data['state_count'];
		$state_count=$state_count-$fixed_count;

		$stock_joint_query2="UPDATE stock_joint
						  SET state_count=$state_count
						  WHERE stock_num=$stock_index";
		$stock_joint_result2=mysqli_query($conn,$stock_joint_query2);

		$update_query="UPDATE stock_sp
					  SET stock_count=$sum_count, total_price=$sum_total_price,dc_price=$sum_dc_price
					  WHERE index_num=$delete_num";
        $update_result=mysqli_query($conn,$update_query);
	}else{

		$update_query="UPDATE stock_sp
					  SET return_price=$sum_return_price
					  WHERE index_num=$delete_num";
        $update_result=mysqli_query($conn,$update_query);

	}

	$stock_del_query="UPDATE 
					  stock_sp_joint
					  SET del_state='y'
					  WHERE index_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);

}
?>
<?
if($_POST['delete_num2']){
	$delete_num=$_POST['delete_num2'];

	$stock_del_query="UPDATE 
					  stock_sp_joint
					  SET del_state='y'
					  WHERE index_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);

}
?>