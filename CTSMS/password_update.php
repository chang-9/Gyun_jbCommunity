<?
include("mysql.php");

$tsm_id=$_POST['id'];
$password=$_POST['password1'];

if($_POST['id']){
	 

	 //회원 정보 테이블
      $mem_info="UPDATE membership SET password='$password' WHERE  id='$tsm_id'";
      $mem_info_result=mysqli_query($conn,$mem_info);

session_start();
session_destroy();

	  echo "<script>
window.location.replace('http://ccit.cafe24.com/CTSMS/sign_in.php');
</script>";
}

?>