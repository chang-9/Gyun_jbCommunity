<?php
//winefeed�� ����� ����ִ� php�̴�.
//�ǵ��� ���信 ���ƿ並 ����������, ������ �ʾҴ��� �Ǻ��ϰ�, ������� �̸��� ������ ����.
//DB����
$host = "localhost";
$user = "ccit";
$password = "CCITmobile07";
$DB_name = "ccit";

$conn = mysqli_connect($host, $user, $password, $DB_name);
mysqli_set_charset($conn, 'utf8');

$num = $_POST['num']; //�ǵ��� ������ȣ
$idnum = $_POST['idnum']; //���̵� ������ȣ

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
                //$likechecknum = $row[2];//��� ������ȣ�� likechecknum������ �ִ´�.

                //���ƿ並 ������ ����� ������ȣ��, �ۼ����� ������ȣ�� wine_review_like ���̺� insert�ȴ�.
                //wine_review_like�� wine_review�� �־��� num���� idnum���� insert���ִٸ� 1�� ��ȯ�Ѵ�.
                //�� ���ƿ並 �����ٸ� 1�� ��ȯ, ���� ���� ���� ���ٸ� 0�� ��ȯ�Ѵ�.

                $res2 = mysqli_query($conn,"SELECT COUNT(*) FROM `wine_review_like` WHERE `review_num` = $likechecknum AND `idnum` = $idnum");
                $row2 = mysqli_fetch_array($res2);

                if($row2[0] == 0){

                      array_push($result,array('description'=>$row[0],'user'=>$row[8], 'likecheck'=>"false", 'like'=>$row[3],'review_num'=>$row[4]));

                }else{

                      array_push($result,array('description'=>$row[0],'user'=>$row[8], 'likecheck'=>"true", 'like'=>$row[3],'review_num'=>$row[4]));
                }
     }      
  //json �ѱ۱����� �ذ��Ѵ�
echo json_encode($result,JSON_UNESCAPED_UNICODE);       
//DB������ ���´�
mysqli_close($conn);
?>