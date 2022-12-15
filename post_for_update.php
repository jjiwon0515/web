<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
    table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
    table.table2 td {
                 width: 600px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
</style>
<body>
    <h1>글 수정</h1>
    <?php
    session_start();
        include "db.php";
        $idx = $_GET['idx'];
        $sql = "select * from m_board where idx=$idx";
        $result= mysqli_query($conn,$sql);
        $array= mysqli_fetch_array($result);
    ?>


    <form action="update_process.php" name='update' method="post">
        <input type="hidden" name="idx" value="<?=$idx?>">
        <table style="width:80%; margin-left:50px; margin-right:20px" >
            <tr>
                <td height=20 align="center" bgcolor="#ccc"><font color=white>글쓰기</font></td>
            </tr>
            <tr>
                <td bgcolor="white">
                    <table class="table2">
                        <tr>
                            <td style="width:10px">작성자</td>
                            <td><input type="text" name="userid" value="<?=$_SESSION['userid']?>" readonly></td>
                        </tr>
                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" style="width:100%" value="<?=$array["title"]?>"required></td>
                        </tr>
                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" rows="15" style="width:800px"><?=$array["content"]?></textarea></td>
                        </tr>
                    </table>
                    <center>
                        <input type="submit" value="글수정">
                        <a href="javascript:history.go(-1)"><input type="button" value="취소"></a>
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
