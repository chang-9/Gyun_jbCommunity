<?php
include("../mysql.php");
if(isset($_POST['stock_num'])){
	$index_num=$_POST['sale_index_num'];
	$c_ordercount=$_POST['ordercount'];		//���� �� �ֹ�����
	$h_ordercount=$_POST['h_ordercount'];	//���� �� �ֹ�����		10
	$h_count=$_POST['h_count'];				//���� ����
	$stock_num=$_POST['stock_num'];
	$h_count2=$_POST['h_count2'];
	$send_addcount=$_POST['send_addcount'];	//�߰��Ǿ�� �� ����
	$tmp_sum_sale_count=$_POST['send_addcount'];

	$stock_joint_query="SELECT *,count(*) as count
	FROM stock
	INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
	WHERE stock_joint.index_num =$stock_num";
	$stock_joint_result=mysqli_query($conn,$stock_joint_query);
	$stock_joint_dataa=mysqli_fetch_array($stock_joint_result);
	$counttest=$stock_joint_dataa['count'];
	$rest_name=$stock_joint_dataa['goods_name'];
	$rest_size=$stock_joint_dataa['goods_size'];

	$result_limit=$counttest-$h_count2;

	$stock_joint_query2="SELECT * 
	FROM stock
	INNER JOIN stock_joint ON stock.index_num = stock_joint.index_num
	WHERE stock_joint.index_num =$stock_num
	ORDER BY stock_joint.goods_date DESC LIMIT $result_limit";
	$stock_joint_result2=mysqli_query($conn,$stock_joint_query2);

	$i=0;
	$j=0;
	$total_count[]=0;
	$all_count[]=0;
	$all[]=0;
	$state=0;
	$total=0;
	$total_test=0;
	$state_count_test=0;
	$r_allcount=0;
	
	while($stock_joint_data=mysqli_fetch_array($stock_joint_result2)){
	$state_count[$i]=$stock_joint_data['state_count'];	//�Ǹŵ� ����
	$total_stock[$i]=$stock_joint_data['total_stock'];	//�����
	$rest_name=$stock_joint_data['goods_name'];		//��ǰ��
	$state_count_test=$state_count_test+$state_count[$i];	//�Ǹŵ� ������ ��
	$total_test=$total_test+$total_stock[$i];				//��ǰ�ϳ��� ���� �� ���

	$state=$total_test-$state_count_test;					//��ǰ�ϳ��� ���� '���� �� ���'

	if($state==0){
		//���ʿ� ��� 0���� ��ǰ
	}
	if($state!=0){	//��� 1�� �̻�
		$stock_num[$i]=$stock_joint_data['index_num'];
		$sort[$i]=$stock_joint_data['sort'];
		$name[$i]=$stock_joint_data['goods_name'];
		$size[$i]=$stock_joint_data['goods_size'];
		$date[$i]=$stock_joint_data['goods_date'];
		$price[$i]=$stock_joint_data['goods_price'];
		$allcount[$i]=$stock_joint_data['total_stock'];	
		$cost_price[$i]=$stock_joint_data['cost_price'];	
		$total_stock[$i]=$stock_joint_data['total_stock'];
		$total_count[$i]=$total_count[$i]+$total_stock[$i];
		$this_count[$i]=$allcount[$i]-$state_count[$i];	


		$send_addcount=$send_addcount-$this_count[$i];
		$all_count[$i]=$all_count[$i]+$allcount[$i];

		if($send_addcount<0){	//����°ͺ��� ��� �� ���� ��� (�˳�)
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
<input type="" name="h_sale_stock_num[]" value="<?=$stock_num[$i];?>">
<input type="hidden" name="h_sale_stock_sort[]" value="<?=$sort[$i];?>">
<input type="" name="h_sale_stock_name[]" value="<?=$name[$i];?>">
<input type="hidden" name="h_sale_stock_size[]" value="<?=$size[$i];?>">
<input type="" name="h_sale_stock_date[]" value="<?=$date[$i];?>">
<input type="hidden" name="h_sale_stock_price[]" value="<?=$price[$i];?>">
<input type="hidden" name="h_sale_stock_cost_price[]" value="<?=$cost_price[$i];?>">
<input type="hidden" name="h_sale_stock_allcount[]" value="<?=$allcount[$i];?>">
<input type="hidden" name="h_sale_stock_count[]" value="<?=$total_stock[$i]-$state_count[$i];?>">
<input type="" name="h_stock_joint_num[]" value="<?=$stock_joint_num[$i];?>">

<?

	$i++;
	if($send_addcount<=0){
		break;
	}

 }
}
	if($send_addcount>0){
		$stock_rest_count=$send_addcount-$total_count[$i];	
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


?>

