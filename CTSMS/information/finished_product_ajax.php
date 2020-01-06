<?
include("../mysql.php");

if($_POST[index_num]){

$index_num=$_POST[index_num];

	/*stock_joint 테이블*/
$stock_joint_query="SELECT *
              FROM stock_joint
			  WHERE index_num=$index_num
              ORDER BY stock_num ASC";
$stock_joint_result=mysqli_query($conn,$stock_joint_query);
}
?>

<?
while($stock_joint_data=mysqli_fetch_array($stock_joint_result)){
?>
<tr id='joint_<?=$stock_joint_data['stock_num'];?>' style="cursor:default;">
<td id='joint_<?=$stock_joint_data['stock_num'];?>' data-title="No" style="text-align: center;"><?=$stock_joint_data['stock_num'];?>
<input type="hidden" name="joint_stock_num[]" value="<?=$stock_joint_data['stock_num'];?>">
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>' data-title="제조일자" style="text-align: center;">
<input type="date" class="form-control"   name="joint_date[]" placeholder="" value="<?=$stock_joint_data['goods_date'];?>" required>
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>'  data-title="원가" style="text-align: center;">
<input type="number" class="form-control"  name="joint_cost_price[]" placeholder="" value="<?=$stock_joint_data['cost_price'];?>" required>
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>'  data-title="단가" style="text-align: center;">
<input type="number" class="form-control"  name="joint_price[]" placeholder="" value="<?=$stock_joint_data['goods_price'];?>" required>
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>' data-title="재고량" style="text-align: center;">
<input type="number" class="form-control"  name="joint_total[]" placeholder="" value="<?=$stock_joint_data['total_stock'];?>" required>
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>' data-title="비고" style="text-align: center;">
<input type="text" class="form-control"  name="joint_blank[]" placeholder="" value="<?=$stock_joint_data['blank'];?>" >
</td>
<td id='joint_<?=$stock_joint_data['stock_num'];?>' data-title="삭제" style="text-align: center;">
<button type="button" onclick="deleteDiv3(<?=$stock_joint_data['stock_num'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
</td>
</tr>
<?
}
?>


<?
if($_POST[delete_num]){
	$delete_num=$_POST[delete_num];

	$stock_del_query="DELETE 
	                  FROM stock_joint
					  WHERE stock_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);

}
?>

