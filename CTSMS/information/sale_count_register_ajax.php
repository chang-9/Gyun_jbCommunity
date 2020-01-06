<?php
include("../mysql.php");

if($_POST['sp_sort']=='s'){
	$index_num=$_POST['sale_index_num'];

	$stock_joint_query="SELECT * 
FROM stock
INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
WHERE stock_joint.index_num =$index_num";
$stock_joint_result=mysqli_query($conn,$stock_joint_query);


$i=0;
$j=0;
$sum_sale_count=$_POST['sale_count'];
$tmp_sum_sale_count=$_POST['sale_count'];
$total_count[]=0;
$all_count[]=0;
$all[]=0;
$state=0;
$total=0;
$total_test=0;
$state_count_test=0;
$k=0;
$r_allcount=0;

while($stock_joint_data=mysqli_fetch_array($stock_joint_result)){

	$state_count[$i]=$stock_joint_data['state_count'];	//판매된 수량
	$total_stock[$i]=$stock_joint_data['total_stock'];	//현재고량
	$rest_name=$stock_joint_data['goods_name'];		//상품명
	$rest_size=$stock_joint_data['goods_size'];		

	$state_count_test=$state_count_test+$state_count[$i];	//판매된 수량의 합
	$total_test=$total_test+$total_stock[$i];				//상품하나에 따른 총 재고량

	$state=$total_test-$state_count_test;					//상품하나에 따른 '남은 총 재고량'

	if($state==0){
		//애초에 재고가 0개인 상품
	}
	if($state!=0){	//재고가 1개 이상
		$stock_num[$i]=$stock_joint_data['index_num'];
		$sort[$i]=$stock_joint_data['sort'];
		$name[$i]=$stock_joint_data['goods_name'];
		$size[$i]=$stock_joint_data['goods_size'];
		$date[$i]=$stock_joint_data['goods_date'];
		$stock_joint_num[$i]=$stock_joint_data['stock_num'];
		$price[$i]=$stock_joint_data['goods_price'];
		$allcount[$i]=$stock_joint_data['total_stock'];	
		$total_stock[$i]=$stock_joint_data['total_stock'];
		$cost_price[$i]=$stock_joint_data['cost_price'];	//원가	
		$total_count[$i]=$total_count[$i]+$total_stock[$i];
		$this_count[$i]=$allcount[$i]-$state_count[$i];	


		$sum_sale_count=$sum_sale_count-$this_count[$i];
		$all_count[$i]=$all_count[$i]+$allcount[$i];

		if($sum_sale_count<0){	//사려는것보다 재고가 더 많을 경우 (넉넉)
			$allcount[$i]=$tmp_sum_sale_count-$all_count[$i];	
			$all[$i]=$tmp_sum_sale_count-$all_count[$i]-$total_stock[$i];

				if($all[$i]<$total_stock[$i]&$all[$i]>0){
					$allcount[$i]=$all[$i];
				}
				if($allcount[$i]<0){
					$allcount[$i]=$tmp_sum_sale_count-$r_allcount;
				}
				if($allcount[$i]>0&$r_allcount>0){
					$allcount[$i]=$tmp_sum_sale_count-$r_allcount;
				}
		}

		if($total_stock[$i]-$state_count[$i]<$allcount[$i]&$state_count[$i]>0){	
			$allcount[$i]=$this_count[$i];						
		}

		$r_allcount=$r_allcount+$allcount[$i];

	?>
<input type="hidden" name="h_sale_stock_num[]" value="<?=$stock_num[$i];?>">
<input type="hidden" name="h_sale_stock_sort[]" value="<?=$sort[$i];?>">
<input type="hidden" name="h_sale_stock_name[]" value="<?=$name[$i];?>">
<input type="hidden" name="h_sale_stock_size[]" value="<?=$size[$i];?>">
<input type="hidden" name="h_sale_stock_date[]" value="<?=$date[$i];?>">
<input type="hidden" name="h_sale_stock_price[]" value="<?=$price[$i];?>">
<input type="hidden" name="h_sale_stock_allcount[]" value="<?=$allcount[$i];?>">
<input type="hidden" name="h_sale_stock_cost_price[]" value="<?=$cost_price[$i];?>">
<input type="hidden" name="h_stock_joint_num[]" value="<?=$stock_joint_num[$i];?>">
<input type="hidden" name="h_sale_stock_count[]" value="<?=$total_stock[$i]-$state_count[$i];?>">

<?
	$i++;
	if($sum_sale_count<=0){
		break;
	}

 }
}

	if($sum_sale_count>0){
		$stock_rest_count=$sum_sale_count-$total_count[$i];	
		$stock_rest_name=$rest_name;
	?>
	
	<input type="hidden" name="h_sale_stock_num[]" value="<?='-';?>">
	<input type="hidden" name="h_sale_stock_sort[]" value="<?='-';?>">
	<input type="hidden" name="h_sale_stock_name[]" value="<?=$stock_rest_name;?>">
	<input type="hidden" name="h_sale_stock_size[]" value="<?=$rest_size;?>">
	<input type="hidden" name="h_sale_stock_date[]" value="<?='-';?>">
	<input type="hidden" name="h_sale_stock_price[]" value="<?=0;?>">
	<input type="hidden" name="h_sale_stock_allcount[]" value="<?=$stock_rest_count;?>">
	<input type="hidden" name="h_sale_stock_cost_price[]" value="<?=0;?>">	
	<input type="hidden" name="h_sale_stock_count[]" value="<?=0;?>">
	<input type="hidden" name="h_stock_joint_num[]" value="">

		<?
	$i++;
	}
	?>


<input type="hidden" id="h_count" name="h_count" value="<?=$i;?>">


<?
}
else{	//매입 
	$i=0;
	$s=0;
	$total_stock=0;
	$hh_stock_num=$_POST['hh_stock_num'];			//상품번호
	$index_num=$_POST['sale_index_num'];			//상품번호
	$purchase_count=$_POST['purchase_count'];		//매입 수량
	$stock_joint_query2="SELECT * 
	FROM stock
	INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
	WHERE stock_joint.index_num =$index_num";
	$stock_joint_result2=mysqli_query($conn,$stock_joint_query2);

	$stock_joint_data2=mysqli_fetch_array($stock_joint_result2);

	$goods_name=$stock_joint_data2['goods_name'];	//상품명		
	$goods_size=$stock_joint_data2['goods_size'];	//중량
	$cost_price=$stock_joint_data2['cost_price'];	//원가			
	$goods_date=$stock_joint_data2['goods_date'];	//제조일자

	$stock_joint_query3="SELECT * 
	FROM stock
	INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num WHERE stock.goods_name='$goods_name'";
	$stock_joint_result3=mysqli_query($conn,$stock_joint_query3);

	while($stock_joint_data3=mysqli_fetch_array($stock_joint_result3)){
		$total_stock_sum[$s]=$stock_joint_data3['total_stock'];	//현재수량	
		$total_stock=$total_stock+$total_stock_sum[$s];
	}


	?>
	<input type="hidden" id="h_index_num" name="h_index_num"  value="<?=$index_num;?>">
	<input type="hidden" id="h_goods_name" name="h_goods_name" value="<?=$goods_name;?>">
	<input type="hidden" id="h_goods_size" name="h_goods_size" value="<?=$goods_size;?>">
	<input type="hidden" id="h_cost_price" name="h_cost_price" value="<?=$cost_price;?>">
	<input type="hidden" id="h_total_stock" name="h_total_stock" value="<?=$total_stock;?>">
	<input type="hidden" id="h_goods_date" name="h_goods_date" value="<?=$goods_date;?>">
<?
	
	
}
?>