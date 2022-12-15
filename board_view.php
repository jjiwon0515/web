<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    td{text-align: center; }
    table th, table td, table{border:0;}
    table{width:100%;border-bottom:1px solid #999; color: #666; font-size:18px;table-layout: fixed;}
    table th{padding:5px 0 6px;border-top:solid 1px #999; border-bottom:solid 1px #b2b2b2; background-color: #f1f1f4; color:#333;font-weight:bold;line-height:20px; vertical-align: top;}
    table td{padding: 8px 0 9px; border-bottom: solid 1px #d2d2d2; text-align: center; line-height: 18px}
</style>
<!-- 글 수정/삭제 시 작성자만 수정/삭제  수정-->
<body>
    <h1>글보기</h1>
    <?php
        include "db.php";
        session_start();
        //echo $_SESSION['user'];
        $idx=$_GET['idx'];
        $cp=$_GET['cp'];
        //해당 글 조회
        $sql = "select * from m_board where idx=$idx";
        $result= mysqli_query($conn,$sql);
        $array= mysqli_fetch_array($result);

        #print_r($row);
        #mysqli_fetch_row => 키값으로 불러오지않고 오직 index값으로만 다룸. 
        #mysqli_fetch_row != mysqli_fetch_array
    ?>

        <table>
            <tr>
                <th>글쓴이</th>
                <td><?=$array['userid']?></td>
                <th>작성일</th>
                <td><?=$array['reg_date']?></td>
                <th>조회</th>
                <td><?=$array["hit"]?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td colspan="5"><?= $array["title"]?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td colspan="5"><?=nl2br($array["content"])?></td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="height: 10px;"></td>
            </tr>
            <tr>
            <?php if($_SESSION['userid']==$array['userid']){?>
                <td>
                    
                    <a href="post_for_update.php?idx=<?=$idx?>">수정</a>
                    <a href="post_for_delete.php?idx=<?=$idx?>">삭제</a>

                </td>
                <?php }?>
            </tr>
            <tr>
                <td align="center"><a href="post_value.php?cp=<?=$cp?>">목록</a></td>
            </tr>
        </table>
        
 

    <!-- 글작성자를 제외하고 글보기시 조회수(hit) 올리기-->
    <?php
    if($_SESSION['userid'] != $array['userid']){
        $hit_sql="update m_board set hit=hit+1 where idx=$idx";
        $re_hit=mysqli_query($conn,$hit_sql);
    
    }

    ?>
    
</body>
</html>
