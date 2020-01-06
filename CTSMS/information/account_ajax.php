<?
include("../mysql.php");

if($_POST['company_index']){
	$company_index=$_POST['company_index'];
	
		/*stock_account 테이블*/
		$stock_account_query="SELECT *
					  FROM stock_account
					  WHERE company_index=$company_index AND state='n'
					  ORDER BY index_num ASC";
		$stock_account_result=mysqli_query($conn,$stock_account_query);
		$stock_account_data2=mysqli_num_rows($stock_account_result);

		if($stock_account_data2==0){
?>
<tr style="cursor:default;">
<td colspan="7" id='explain_list_collection'>※ 등록된 계좌 정보가 없습니다.</td>
</tr>
<?
		}else{


		while($stock_account_data=mysqli_fetch_array($stock_account_result)){

	          
		
?>
<tr id='account_tr<?=$stock_account_data['index_num'];?>' style="cursor:default;">
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="No" style="text-align: center;"><?=$stock_account_data['index_num'];?>
<input type="hidden" name="account_index_num[]" value="<?=$stock_account_data['index_num'];?>">
</td>
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="은행" style="text-align: center;">
<input type="text" class="form-control" name="account_bank[]" value="<?=$stock_account_data['bank'];?>">
</td>
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="계좌" style="text-align: center;">
<input type="text" class="form-control" name="account_account[]" value="<?=$stock_account_data['account'];?>">
</td>
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="예금주" style="text-align: center;">
<input type="text" class="form-control" name="account_name2[]" value="<?=$stock_account_data['account_name'];?>">
</td>
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="비고" style="text-align: center;">
<input type="text" class="form-control" name="account_blank[]" value="<?=$stock_account_data['blank'];?>">
</td>
<td id='account_<?=$stock_account_data['index_num'];?>' data-title="삭제" style="text-align: center;">
<button type="button" onclick="deleteDiv2(<?=$stock_account_data['index_num'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
</td>
</tr>
<?
		}
}
}

if(isset($_POST['delete_num'])){

	$delete_num=$_POST['delete_num'];
	



	$stock_del_query="UPDATE 
					  stock_account
					  SET state='y'
					  WHERE index_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);



}
?>