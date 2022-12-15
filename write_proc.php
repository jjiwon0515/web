<?php
session_start();

include "db.php";
//사용자 정보 입력
$userid=$_REQUEST['userid'];
$title=$_REQUEST['title'];
$content=$_REQUEST['content'];

$sql ="insert into m_board values('','$userid','$title','$content',0,now(),'')";


$result=mysqli_query($conn,$sql);

#header 함수에서 Location 인자와 주소인자간의 띄어씌가 없어야한다. (*띄어쓰기가 있으면 함수가 작동하지 않음)
header("Location:http://syaic06.cafe24.com/jiwon0515/post_value.php?userid=$userid");
exit();
?>
