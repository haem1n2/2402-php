<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/src/1config.php");
require_once(FILE_LIB_DB); // DB관련 라이브러리

// post 처리
if(REQUEST_METHOD === "POST") {
  try{
    // 파라미터 획득
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title 획득
    
    // 파라미터 에러 체크
    $arr_err_param = [];
    if($title === ""){
      $arr_err_param[] ="title";
    }
    if(count($arr_err_param) > 0 ){
      // 예외 처리
      throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
    }

    // DB connect
    $conn = my_db_conn(); //PDO 인스턴스

    // Transaction 시작
    $conn->beginTransaction();
    
    // 게시글 작성 처리
    $arr_param = [
      "title" => $title
    ];
    $result = db_insert_todo($conn, $arr_param);

    // 글 작성 예외처리
    if($result !== 1) {
      throw new Exception("Insert todo count");
    }
    // 커밋
    $conn->commit();

    //리스트 페이지로 이동
    header("Location: 1main.php");
    exit;

  } catch (\Throwable $e) {
    if(!empty($conn)){
      $conn->rollBack();
    }
    echo $e->getMessage();
    exit;

  } finally {
    if(!empty($conn)) {
      $conn = null;
    }
  }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>작성페이지</title>
    <link rel="stylesheet" href="./1common.css">
</head>
<body>
    <div class="background">
    <div class="header">
    <h1>&nbsp &nbspTO DO LIST&nbsp &nbsp</h1>
</div>
<form action="./1insert.php" method="post">
    <div class="border">
        <div class="cont">
        <input type="hidden" name="no" >
        <input class="out" type="checkbox" name="nemo" id="nemo" >
        <label for="nemo"></label>
        <input class="in" type="text" id="name" name="title" required >
        <label for="name"></label>
        <button class="divbutton2" type="submit">전송</button>
       <a href="./index.html"><button class="divbutton" type="reset">⚔</button></a>
       </div>
    </div>
</form>
    
</div>
</div>
</body>
</html>