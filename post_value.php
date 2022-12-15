<?php session_start() ?>
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
<body> 
    <?php
    include "db.php";
    
    //전체 글의 수 조회
    // login_proc.php에서 가져온 세션 존재
    //echo $_SESSION['userid'];
    
    // echo $_SESSION['name'];
    $userid=$_SESSION['userid'];


    $sql = "select count(*) from m_board";
    $result=mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result);
    $total_item=$row[0];
    //페이지 당 글의 수
    $paper_per_item=10;
    //전체 페이지 = 전체 글의 수 / 페이지 당 글의 수
    $total_page=ceil($total_item/$paper_per_item);
    $current_page=$_GET['cp'];
    //현재 페이지값이 없을 경우??
    if(!$current_page) $current_page=1;
    //페이지의 첫 글의 번호 (idx의 반대 순서<->근거: 뒤에 sql에서 desc순으로 정렬해서 select하기 때문이다)
    //각각의 페이지에서 시작하는 글의 위치(0~9,10~19,20~29,30~39.....)
    $start = $paper_per_item*($current_page-1);

    //글 목록 조회
    $sql = "select idx,userid,title,reg_date,hit from m_board order by idx desc limit $start,$paper_per_item";
    $result=mysqli_query($conn,$sql);
    $num_rows=mysqli_num_rows($result);//전체 글의 개수
    ?>
<!--- 로그인 후 세션 설정한 것을 이용하여 글쓰기 할 때 로그인한 사용자 아이디로 글쓰기 되도록 수정

(임의로 아이디 입력 및 수정 불가하도록 설정)
-->
    <h1>게시판</h1>
    <table>
        <tr>
            <th style="width:10%;">글번호</th>
            <th style="width:10%;">글쓴이</th>
            <th >제목</th>
            <th style="width:30%;">작성일</th>
            <th style="width:7%;">조회수</th>
        </tr>
        <?php for($i=0;$i<$num_rows;$i++){
            $row = mysqli_fetch_array($result);    
        ?>
        <tr>
            <td><?php echo $row['idx'] ?></td>
            <td><?php echo $row['userid'] ?></td>
            <!--각 페이지에 맞는 인자값 설정 board_view.php?idx=<php구문>-->
            <td style="text-align : left;"><a href="board_view.php?idx=<?=$row['idx']?>&cp=<?=$current_page?>"><?php echo $row['title'] ?></td>
            <td><?php echo $row['reg_date'] ?></td>
            <td><?php echo $row['hit'] ?></td>
        </tr>
        <?php }?>
    </table>
    <?php
        $prev=$current_page-1;
        $next=$current_page+1;
    ?>
    <table style="width:1250px; padding: 200px">
        <tr style="height:10px;">
            <td colspan="3"></td>
        </tr>
        <tr>
            <td style ="width:10%; text-align: left">
                <?php if($prev > 0) { ?>
                <a href="http://syaic06.cafe24.com/jiwon0515/post_value.php?cp<?=$prev ?>">이전</a>
                <?php } ?>
            </td>
            <td><a style="text-align: center;"href="post.php">글쓰기</a></td>
            <td style ="width:10%; text-align: right">
                <?php if($next <= $total_page) {?>
                <a href="?cp=<?=$next?>">다음</a>
                <?php }?>
            </td>
        </tr>
        </table>
   
</body>
</html>
