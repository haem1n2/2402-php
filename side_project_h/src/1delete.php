<?php
// 설정 정보
require_once( $_SERVER["DOCUMENT_ROOT"]."/src/1config.php");; // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
    // DB Connect
    $conn = my_db_conn(); // PDO 인스터스 생성

    // Method
    if(REQUEST_METHOD === "GET") {
    // 게시글 데이터 조회
    // 파라미터 획득
  $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
  $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

  $arr_err_param = [];
  if($no === ""){
      $arr_err_param[] = "no";
  }
  if($page === "") {
    $arr_err_param[] = "page";
  }
  if(count($arr_err_param) > 0) {
    throw new Exception("Parameter Error : ".implode(",", $arr_err_param));
  }

  // 게시글 정보 획득
  $arr_param = [
      "no" => $no
  ];
  $result = db_select_todo_no($conn, $arr_param);
  if(count($result) !== 1){
    throw new Exception("Select Boards no count");
  }
  
  // 아이템 셋팅
  $item = $result[0];
    }
 

    else if(REQUEST_METHOD === "POST") {
        
    // 파라미터 획득
    $no = isset($_POST["no"]) ? $_POST["no"] : "";

    $arr_err_param = [];
    if($no === ""){
    $arr_err_param[] = "no";
}
    if(count($arr_err_param) > 0) {
        throw new Exception("Parameter Error : ".implode(",", $arr_err_param));
    }
}
    // Transaction 시작
    $conn->beginTransaction();

    // 게시글 정보 삭제
    $arr_param = [
        "no" => $no
    ];
    $result = db_delete_todo($conn, $arr_param);

    // 삭제 예외 처리
    if($result !== 1) {
        throw new Exception("Delete todo no count");
    }

    // commit
    $conn->commit();
    header("Location: 1main.php");

}   catch (\Throwable $e) {
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
}   finally {
    // PDO파기
    if(!empty($conn)) {
        $conn = null;
    }
}


?>