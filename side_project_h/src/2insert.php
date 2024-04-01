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
      // throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
      throw new Exception("뭐라도 입력하소");
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
