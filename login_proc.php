<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
session_start();



include "db.php";
//사용자 정보 입력
$userid=$_REQUEST['userid'];
$passwd=$_REQUEST['passwd'];
//사용자 조회
//password() : sql함수 암호화해주는 함수
$sql="select * from user where userid ='$userid' and passwd ='$passwd'";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    //사용자 인증
     $row =mysqli_fetch_array($result);
     echo "{$row['name']}님 접속을 환영합니다 ";
     $_SESSION['userid']= $row['userid'];
     $_SESSION['name']= $row['name'];
     header("Location:http://syaic06.cafe24.com/jiwon0515/post_value.php");
 }else{
    //인증 오류
     echo "아이디 또는 비밀번호가 올바르지 않습니다.";
     header("Location:http://syaic06.cafe24.com/jiwon0515/login.php");
 }
 
?>

</body>
</html>
