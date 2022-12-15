<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        margin-left:auto; 
    margin-right:auto;
    }
    .first{
    
    height: 50px;
    background: #FFBB00;
    border-radius: 5px;
    border: none;
    font-family: "맑은 고딕";
    }
    h1{
        text-align: center;
    }
</style>
<body>
    <h1>로그인</h1>
    <table sytle="margin: 0px; padding: 0px">
    <span>
    <form action="login_proc.php" name ="login" method="post">
         <tbody sytle="margin:0px">
            <tr>
                <td>아이디</td>
                <td><input type="text" name="userid" required></td>
                <td rowspan="3"><input class="first"type="submit" value="로그인"></td>   
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="text" name="passwd" required></td>
    </form>
            </tr>
          </tbody>
          <form action="register.php" name="register" method="get">
                    <td><input type="submit" value="회원가입"></td>
          </form>
    
    </table>


    
</body>
</html>
