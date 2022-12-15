<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>글삭제</h1>
    <?php
        $idx = $_GET['idx'];
    ?>
    <form action="delete_process.php" name="delete" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <p>정말로 삭제하시겠습니까?</p>
    <table style="width:600px;">
            <tr>
                <td align="center">
                    <input type="submit" value="글삭제">
                    <a href="javascript:history.go(-1)"><input type="button" value="취소"></a>
                </td>
            </tr>
            
        </table>
    </form>
    
</body>
</html>
