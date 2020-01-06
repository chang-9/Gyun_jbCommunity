<?
include("../mysql.php");

if($_POST[index_num]){

$index_num=$_POST[index_num];

	/*stock_composition 테이블*/
$stock_composition_query="SELECT *
              FROM stock_composition
			  WHERE no=$index_num
              ORDER BY index_num ASC";
$stock_composition_result=mysqli_query($conn,$stock_composition_query);
}
?>

<?
while($stock_composition_data=mysqli_fetch_array($stock_composition_result)){
?>
<tr id='composition_<?=$stock_composition_data['index_num'];?>' style="cursor:default;">
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="상품번호" style="text-align: center;"><?=$stock_composition_data['index_num'];?>
<input type="hidden" name="composition_index_num[]" value="<?=$stock_composition_data['index_num'];?>">
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="브랜드" style="text-align: center;"><?=$stock_composition_data['goods_brand'];?>
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="구분" style="text-align: center;"><?=$stock_composition_data['sort'];?>
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="상품명" style="text-align: center;"><?=$stock_composition_data['goods_name'];?>
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="중량(g)" style="text-align: center;"><?=$stock_composition_data['goods_size'];?>
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="소요량" style="text-align: center;">
<input type="number" class="form-control"  name="composition_count[]" placeholder="" value="<?=$stock_composition_data['goods_count'];?>" required>
</td>
<td id='composition_<?=$stock_composition_data['index_num'];?>' data-title="삭제" style="text-align: center;">
<button type="button" onclick="deleteDiv3(<?=$stock_composition_data['index_num'];?>)" class="btn btn-primary m-t-15 waves-effect">삭제</button>
</td>
</tr>
<?
}
?>


<?
if($_POST[delete_num]){
	$delete_num=$_POST[delete_num];
	

	$stock_del_query="DELETE 
	                  FROM stock_composition
					  WHERE index_num=$delete_num";
    $stock_del_result=mysqli_query($conn,$stock_del_query);

}
?>

