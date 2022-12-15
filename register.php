<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        text-align: center;
    }
    table{
        margin-left:auto; 
    margin-right:auto;
    }
    
</style>
<body>
    <h1>회원가입</h1>
    <form action="register_proc.php" name="register" method="get">
    <table>
            <tr>
                <td>아이디</td>
                <td><input type="text" name="userid" required></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="text" name="passwd" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="확인"></td>
            </tr>
    </table>
    </form>
</body>
</html>
