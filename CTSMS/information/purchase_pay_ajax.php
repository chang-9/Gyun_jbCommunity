<?
include("../mysql.php");

if($_POST['sp_num']){
	$sp_num=$_POST['sp_num'];
	
		/*stock_collection 테이블*/
		$stock_collection_query="SELECT *
					  FROM stock_collection
					  WHERE sp_num=$sp_num AND state LIKE 'n'
					  ORDER BY date ASC";
		$stock_collection_result=mysqli_query($conn,$stock_collection_query);
		$stock_collection_data2=mysqli_num_rows($stock_collection_result);

		if($stock_collection_data2==0){
?>
<tr id='collection_tr<?=$stock_collection_data['index_num'];?>' style="cursor:default;">
<td colspan="7" id='explain_list_collection'>※ 등록된 지급액이 없습니다.</td>
</tr>
<?
		}else{


		while($stock_collection_data=mysqli_fetch_array($stock_collection_result)){

	          
		
?>
<tr id='collection_tr<?=$stock_collection_data['index_num'];?>' style="cursor:default;">
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="No" style="text-align: center;"><?=$stock_collection_data['index_num'];?>
<input type="hidden" name="collection_index_num[]" value="<?=$stock_collection_data['index_num'];?>">
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="일자" style="text-align: center;">
<input type="date" class="form-control" name="collection_date[]" value="<?=$stock_collection_data['date'];?>">
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="지급액" style="text-align: center;">
<input type="number" class="form-control" name="collection_price[]" value="<?=$stock_collection_data['price'];?>">
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="구분" style="text-align: center;">
<select class="form-control show-tick"  name="collection_sort[]" style="width:100px;"><option value="현금" <?if($stock_collection_data['sort']=="현금"){echo "selected";}?>>현금</option><option value="무통장입금" <?if($stock_collection_data['sort']=="무통장입금"){echo "selected";}?>>무통장입금</option><option value="카드" <?if($stock_collection_data['sort']=="카드"){echo "selected";}?>>카드</option><option value="기타" <?if($stock_collection_data['sort']=="기타"){echo "selected";}?>>기타</option></select>
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="계좌" style="text-align: center;">
<input type="text" class="form-control" name="collection_account[]" value="<?=$stock_collection_data['account'];?>">
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="비고" style="text-align: center;">
<input type="text" class="form-control" name="collection_blank[]" value="<?=$stock_collection_data['blank'];?>">
</td>
<td id='collection_<?=$stock_collection_data['index_num'];?>' data-title="삭제" style="text-align: center;">
<button type="button" onclick="deleteDiv2(<?=$stock_collection_data['index_num'];?>,<?=$stock_collection_data['sp_num'];?>,<?=$stock_collection_data['price'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
</td>
</tr>
<?
		}
}
}

if(isset($_POST['delete_num'])){

	$delete_num=$_POST['delete_num'];
	$sp_num=$_POST['sp_num'];
	$sum_price=$_POST['sum_price'];


	$stock_del_query="UPDATE 
					  stock_collection
					  SET state='y'
					  WHERE index_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);


	
			/*$query="SELECT
			        FROM stock_sp					
					WHERE index_num=$sp_num";
			$result=mysqli_query($conn,$query);
			$data=mysqli_fetch_array($result);
			$sum_price=$data['price']-$price;*/



	        /*stock_sp 수정*/
			$query2="UPDATE stock_sp
					SET 
                    price=$sum_price 
					WHERE index_num=$sp_num";
			$result2=mysqli_query($conn,$query2);
}
?>