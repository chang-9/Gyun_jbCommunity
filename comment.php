<?php
//winefeed의 댓글을 띄워주는 php이다.
//피드의 리뷰에 좋아요를 눌렀었는지, 누르지 않았는지 판별하고, 사용자의 이름과 내용을 띄운다.
//DB접속
$host = "localhost";
$user = "ccit";
$password = "CCITmobile07";
$DB_name = "ccit";

$conn = mysqli_connect($host, $user, $password, $DB_name);
mysqli_set_charset($conn, 'utf8');

$num = $_POST['num']; //피드의 고유번호
$idnum = $_POST['idnum']; //아이디 고유번호

$res3 = mysqli_query($conn, "SELECT *
FROM wine_review A
INNER JOIN wine_signup B ON A.idnum = B.idnum where A.num='$num'");
//$res = mysqli_query($conn,"SELECT user from wine_signup where idnum = $idnum");
//$row = mysqli_fetch_array($res3);
//$user = $row[8];

     //$res= mysqli_query($conn,"SELECT * from wine_review where `num`=$num");
     $result =array();
     while($row = mysqli_fetch_array($res3))
     {
                  $likechecknum = $row[4];
                //$likechecknum = $row[2];//댓글 고유번호를 likechecknum변수에 넣는다.

                //좋아요를 누르면 댓글의 고유번호와, 작성자의 고유번호가 wine_review_like 테이블에 insert된다.
                //wine_review_like에 wine_review에 있었던 num값과 idnum값이 insert되있다면 1을 반환한다.
                //즉 좋아요를 눌렀다면 1을 반환, 아직 누른 적이 없다면 0을 반환한다.

                $res2 = mysqli_query($conn,"SELECT COUNT(*) FROM `wine_review_like` WHERE `review_num` = $likechecknum AND `idnum` = $idnum");
                $row2 = mysqli_fetch_array($res2);

                if($row2[0] == 0){

                      array_push($result,array('description'=>$row[0],'user'=>$row[8], 'likecheck'=>"false", 'like'=>$row[3],'review_num'=>$row[4]));

                }else{

                      array_push($result,array('description'=>$row[0],'user'=>$row[8], 'likecheck'=>"true", 'like'=>$row[3],'review_num'=>$row[4]));
                }
     }      
  //json 한글깨짐을 해결한다
echo json_encode($result,JSON_UNESCAPED_UNICODE);       
//DB연결을 끊는다
mysqli_close($conn);
?>