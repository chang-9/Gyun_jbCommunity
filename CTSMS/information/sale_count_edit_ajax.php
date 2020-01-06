<?php
include("../mysql.php");
if(isset($_POST['sale_index_num'])){
	$index_num=$_POST['sale_index_num'];
	$count=$_POST['count'];				//변경 수량
	$allcounttwo=$_POST['allcounttwo'];	//현재수량
	$post_count=$_POST['post_count'];	//작성한 수량(변경 전)
	$num=$_POST['num'];
	$stock_num=$_POST['stock_num'];

	$stock_joint_query="SELECT * FROM stock
	INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
	WHERE stock_joint.index_num =$index_num";
	$stock_joint_result=mysqli_query($conn,$stock_joint_query);

	$state_count_test=0;
	$total_test=0;
	$state=0;
	$i=0;
	$total_stock_j=0;
	$k=0;

	while($stock_joint_data=mysqli_fetch_array($stock_joint_result)){
		$total_stock=$stock_joint_data['total_stock'];
		$total_stock_array[$i]=$stock_joint_data['total_stock'];

		$stock_num[$i]=$stock_joint_data['index_num'];
		$rest_name=$stock_joint_data['goods_name'];		//상품명
		$state_count[$i]=$stock_joint_data['state_count'];	//판매된 수량
		$name[$i]=$stock_joint_data['goods_name'];
		$size[$i]=$stock_joint_data['goods_size'];
		$price[$i]=$stock_joint_data['goods_price'];
		$sort[$i]=$stock_joint_data['sort'];


		$each_stock_count[$i]=$total_stock_array[$i]-$state_count[$i];	
		
		$excess_count=$post_count-$allcounttwo;	//5

		$state_count_test=$state_count_test+$state_count[$i];	//판매된 수량의 합
		$total_test=$total_test+$total_stock_array[$i]-$state_count[$i];				//상품하나에 따른 총 재고량
		//52
		
		$state=$total_test-$state_count_test-$allcounttwo;		

		if($i<$num){	//0 1 2 < 2
			$each_sum=$each_sum+$each_stock_count[$i];
			//echo $each_sum;	//32
		}

		$count_gap=$total_test-$each_sum;	//20

		if($i==$num){
			$date=$stock_joint_data['goods_date'];	//2018-05-16
		}

		if($state==0){
			echo "if";
		
		}
		else{
			if($i==$num){
			?>
			<input type="hidden" name="h_sale_stock_num" id="h_sale_stock_num" value="<?=$index_num;?>">
			<input type="hidden" name="h_sale_stock_date" id="h_sale_stock_date" value="<?=$date;?>">
			<input type="hidden" name="h_sale_excess_count" id="h_sale_excess_count" value="<?=$excess_count;?>">
			<input type="hidden" name="h_sale_stock_name" id="h_sale_stock_name" value="<?=$name[$i];?>">
			<input type="hidden" name="h_sale_stock_size" id="h_sale_stock_size" value="<?=$size[$i];?>">
			<input type="hidden" name="h_sale_stock_price" id="h_sale_stock_price" value="<?=$price[$i];?>">
			<input type="hidden" name="h_sale_stock_sort" id="h_sale_stock_sort" value="<?=$sort[$i];?>">
			<input type="hidden" name="h_sale_total_stock" id="h_sale_total_stock" value="<?=$total_stock_array[$i];?>">
			<?
			}
		}

		$i++;
	}
		if($i-1!=$num){
			$stock_rest_count=$excess_count;	
			$stock_rest_name=$rest_name;
		}
	?>
<input type="hidden" name="h_stock_rest_name[]" id="h_stock_rest_name[]" value="<?=$stock_rest_name;?>">

<input type="hidden" name="h_stock_rest_count[]" id="h_stock_rest_count[]" value="<?=$stock_rest_count;?>">

<?


}



?>

