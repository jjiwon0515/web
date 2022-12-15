<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    include "db.php";
    $userid=$_GET['userid'];
    $password=$_GET['passwd'];
    
    $sql="insert into user (userid,passwd) values ('$userid','$password')";
    $result=mysqli_query($conn,$sql);
    
    header("Location:http://syaic06.cafe24.com/jiwon0515/login.php")
    ?>
</body>
</html>
