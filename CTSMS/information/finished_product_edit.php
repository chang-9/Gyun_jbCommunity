<?
include("../mysql.php");

if($_POST['goods_brand']){//완제품 수정
    
    $index_num=$_POST['hidden_index'];//index_num

    $goods_brand=$_POST['goods_brand'];//브랜드
	$sort=$_POST['sort'];//구분
	$goods_name=$_POST['goods_name'];//상품명
	$goods_size=$_POST['goods_size'];//중량(g)
	//$goods_count=$_POST['goods_count'];//수량
	$outline=$_POST['outline'];//비고




	/*등록되어 있던 제조일자별 완제품*/
    $arrayjoint_stock_num =$_POST['joint_stock_num'];//stock_num
	$arrayjoint_date =$_POST['joint_date'];//제조일자
	$arrayjoint_cost_price =$_POST['joint_cost_price'];//원가
	$arrayjoint_price =$_POST['joint_price'];//단가
	$arrayjoint_total =$_POST['joint_total'];//재고량
	$arrayjoint_blank =$_POST['joint_blank'];//비고



	/*제조일자별 완제품 추가*/
	$arraydate =$_POST['goods_date'];//제조일자
	$arraycostprice =$_POST['cost_price'];//제조원가
	$arrayprice =$_POST['goods_price'];//제조단가
	$arraytotal =$_POST['goods_total'];//재고량
	$arrayblank =$_POST['goods_blank'];//비고
   


	


	
	/*완제품 수정*/
	$stock_query="UPDATE stock
	               SET goods_brand='$goods_brand',sort='$sort',goods_name='$goods_name',outline='$outline',goods_size=$goods_size
				   WHERE index_num = $index_num";
	$stock_result=mysqli_query($conn,$stock_query);



	//완제품 제조일자별 수정
    if(count($arrayjoint_stock_num)!=0){

	
	for($i=0; $i<count($arrayjoint_stock_num);$i++){


		/*stock_joint 테이블 */
		$stock_joint_info="SELECT barcode_num
					 FROM stock_joint
                     WHERE stock_num=$arrayjoint_stock_num[$i]	
					 ";
		$stock_joint_info_result=mysqli_query($conn,$stock_joint_info);
		$joint_data = mysqli_fetch_array($stock_joint_info_result);
		$barcode_num[$i]=$joint_data['barcode_num'];

        $barcode_num[$i]=substr($barcode_num[$i],0, 6);



        //바코드 생성
		$arrayyear[$i]=substr($arrayjoint_date[$i],2, 2);
		$arraymonth[$i]=substr($arrayjoint_date[$i],5, 2);
		$arrayday[$i]=substr($arrayjoint_date[$i],8, 2);


        $arraydate3[$i]="$arrayyear[$i]$arraymonth[$i]$arrayday[$i]";


		
		$arraybarcode[$i]="$barcode_num[$i]$arraydate3[$i]";
        //END 바코드 생성

		


       
		$stock_up_query="UPDATE stock_joint
		                 SET goods_date='$arrayjoint_date[$i]', goods_price=$arrayjoint_price[$i], total_stock=$arrayjoint_total[$i], barcode_num='$arraybarcode[$i]', cost_price=$arrayjoint_cost_price[$i]
						 WHERE stock_num=$arrayjoint_stock_num[$i]
						 ";
        $stock_up_result=mysqli_query($conn,$stock_up_query);

		
	}


	}//END 완제품 제조일자별 수정







	//완제품 제조일자별 추가
    if(count($arraydate)!=0){

     //국가번호+sort
	$sort="8802";

	/*stock_joint 테이블 stock_num 맨끝 번호*/
	$stock_joint="SELECT stock_num
				 FROM stock_joint
				 ORDER BY stock_num DESC
				 ";
	$stock_joint_result=mysqli_query($conn,$stock_joint);
	$stock_joint_num = mysqli_fetch_array($stock_joint_result);

	$stock_num=$stock_joint_num['stock_num']+1;


		for($i=0; $i<count($arraydate);$i++){

		$stock_num=$stock_num+$i;

		
		if($stock_num<10){
			$stock_num="0$stock_num";
		}


		$arrayyear2[$i]=substr($arraydate[$i],2, 2);
		$arraymonth2[$i]=substr($arraydate[$i],5, 2);
		$arrayday2[$i]=substr($arraydate[$i],8, 2);


        $arraydate2[$i]="$arrayyear2[$i]$arraymonth2[$i]$arrayday2[$i]";



		//바코드 생성
		$arraybarcode2[$i]="$sort$stock_num$arraydate2[$i]";


		

		//등록
		$stock_joint_insert="INSERT INTO stock_joint
							  (stock_num, index_num, goods_date, goods_price, total_stock, barcode_num, blank,cost_price)
							  VALUE
							  ($stock_num, $index_num, '$arraydate[$i]',$arrayprice[$i], $arraytotal[$i], '$arraybarcode2[$i]', '$arrayblank[$i]',$arraycostprice[$i])";
		$stock_joint_insert=mysqli_query($conn,$stock_joint_insert);
         

		}

	}//END 완제품 제조일자별 추가



	echo "<meta charset='utf-8'><script>alert('완제품이 수정 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/finished_product.php');
	</script>";


	
//END 완제품 수정
}else{//완제품 사용 수정

	$index_num=$_GET['index_num'];


	/*stock 중단,허용 여부 확인*/
	$stock_info="SELECT division
				 FROM stock
				 WHERE index_num=$index_num
				 ";
	$stock_info_result=mysqli_query($conn,$stock_info);
	$stock_division = mysqli_fetch_array($stock_info_result);



	if($stock_division['division']=="사용"){//완제품 사용 중단할 경우



   /*완제품 사용중단*/
	$stock_query="UPDATE stock
	               SET 	division='사용 안함'
				   WHERE index_num = $index_num";
	$stock_result=mysqli_query($conn,$stock_query);
    

	echo "<meta charset='utf-8'><script>alert('완제품이 사용 중단 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/finished_product.php');
	</script>";



    //END 완제품 사용 중단할 경우
	}else{//완제품 사용 허용할 경우




    /*완제품 사용중단*/
	$stock_query="UPDATE stock
	               SET 	division='사용'
				   WHERE index_num = $index_num";
	$stock_result=mysqli_query($conn,$stock_query);
    

	echo "<meta charset='utf-8'><script>alert('완제품이 사용 허용 되었습니다.');
	window.location.replace('http://ccit.cafe24.com/CTSMS/information/finished_product.php');
	</script>";


    //END 완제품 사용 허용할 경우
	}

//END 완제품 사용 수정
}

?>