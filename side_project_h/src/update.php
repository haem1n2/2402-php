<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/src/1config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try{
    $conn = my_db_conn();
    // Query 실행
     // 파라미터에서 page 획득
     $no = isset($_POST["no"]) ? $_POST["no"] : "";
     $page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 획득
    
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

    // 게시글 리스트 조회
    $arr_param = [
        "no" => $no
    ];
    $conn->beginTransaction();
    $result = db_update_todo_no($conn, $arr_param);    
    $conn->commit();
    header("Location: 1main.php?&page=".$page."#border".$no);
} catch(\Throwable $e){
    if(!empty($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }
    echo $e ->getMessage();
    exit;
} finally {
    // PDO 파기
    if(!empty($conn)){
        $conn = null;
    }
}
?>