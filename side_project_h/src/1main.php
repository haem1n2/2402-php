<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/src/1config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리
$list_cnt = 5; //한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try{
    $conn = my_db_conn();
    // Query 실행
     // 파라미터에서 page 획득
      
        $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;
        

                 
     // 게시글 수 조회
     $result_board_cnt = db_select_todo_cnt($conn);

     $max_page_num = ceil($result_board_cnt / $list_cnt);   // 최대 페이지 수
     $offset = $list_cnt * ($page_num - 1); // OFFSET
     $prev_page_num= ($page_num -1) < 1 ? 1 : ($page_num - 1) ; // 이전 버튼 페이지 번호
     $next_page_num= ($page_num + 1) > $max_page_num  ? $max_page_num : ($page_num + 1); // 다음 버튼 페이지 번호
    // 게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];
    $result = db_select_todo_paging($conn, $arr_param);
    // var_dump($result);
    // exit;
    
}   catch(\Throwable $e){
    echo $e ->getMessage();
    exit;
}   finally {
    // PDO 파기
    if(!empty($conn)){
        $conn = null;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./1common.css">
    <title>메인페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>
</head>
<body>
    <div class="background">
    <div class="header">
    <h1><a href="./1main.php">&nbsp &nbspTO DO LIST&nbsp &nbsp</a></h1>
</div>
 <div class="divbutton2">
    <div></div>
     <a href=./1insert.php type="submit">글쓰기</a>
 </div>   
<?php foreach ($result as $item){
?>
<div class="border">
    <div class="cont">
        <form action="./update.php" method="post">
            <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
            <button type="submit" class="btn-update" id="nemo<?php echo $item["no"];?>"></button>
            <label for="nemo<?php echo $item["no"];?>"><?php echo $item["flg_com"] === "1" ? "✔ " : "" ?></label>
            <label for="name"></label>
            <input class="in" type="text" id="name" name="title"  required value ="<?php echo $item["title"]; ?>">
            <label for="name"></label>
        </form>
        <form action="./1delete.php" method="post">
            <input type="hidden" name="no" value="<?php echo $item["no"]; ?>">
            <button type="submit" class ="divbutton">⚔</button> 
        </form>
    </div>
</div>
<?php
}
?>
</div>
<div class="main-bottom">
    <a href="./1main.php?page=<?php echo $prev_page_num ?>"class ="a-button small-button">이전</a>
    <?php
    for($num = 1; $num <= $max_page_num; $num++) {
    ?>
    <a href="./1main.php?page=<?php echo $num ?>" class ="a-button small-button"><?php echo $num ?></a>
    <?php
    }
    ?>
    <a href="./1main.php?page=<?php echo $next_page_num ?>" class ="a-button small-button">다음</a>
</div>
</div>
</body>
</html>