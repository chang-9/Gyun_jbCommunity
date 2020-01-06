<?
include("../mysql.php");




$_POST['index_num'];
$_POST['target'];
$_POST['division'];







if($_POST['target']=="원재료"){



	if($_POST['division']=="사용"){
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용중단'>";
	}else{
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용허용'>";
	}

	
}





if($_POST['target']=="거래처"){



	if($_POST['division']=="사용"){
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용중단'>";
	}else{
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용허용'>";
	}
	
}


if($_POST['target']=="완제품"){



	if($_POST['division']=="사용"){
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용중단'>";
	}else{
		echo"<input type='button' onclick='stop(".$_POST['index_num'].");' class='btn btn-primary m-t-15 waves-effect' value='사용허용'>";
	}
	
}



?>