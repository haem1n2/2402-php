<?php
function my_db_conn() {
    //설정 정보
    $option = [
    PDO::ATTR_EMULATE_PREPARES      =>FALSE
    ,PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
    ,PDO::ATTR_DEFAULT_FETCH_MODE       => PDO::FETCH_ASSOC
    ];

    //
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}

    // 쿼리 작성
    function db_select_todo_cnt(&$conn){
            // sql 작성
            $sql =
            " SELECT "
            ." COUNT(no) as cnt "
            ." FROM "
            ." todo "
            ." WHERE "
            ." deleted_at IS NULL "
            ;
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll();

            return (int)$result[0]["cnt"];
        }
    function db_select_todo_paging(&$conn, &$array_param) {
            $sql =
                " SELECT "
                ." no "
                ." ,title "
                ." ,created_at "
                ." ,flg_com "
                ." FROM "
                ." todo "
                ." WHERE "
                ." deleted_at IS NULL "
                ." ORDER BY "
                ." no DESC "
                ." LIMIT :list_cnt OFFSET :offset "
                ;
            // Query 실행
            $stmt = $conn->prepare($sql);
            $stmt->execute($array_param);
            $result = $stmt->fetchAll();
            
            // 리턴
            return $result;
        }
        function db_insert_todo(&$conn, &$array_param) {
            $sql = 
                " INSERT INTO todo( "
                ." title "
                ." )"
                ." VALUES( "
                ." :title "
                ." ) "
                ;
        
            // Query 실행
            $stmt = $conn->prepare($sql);
            $stmt->execute($array_param);
    
        
            // 리턴
            return $stmt->rowCount();
        
        }

                // pk로 게시글 정보 조회
    function db_select_todo_no(&$conn, &$array_param) {
        $sql =
        " SELECT "
        ."  no  "
        ."  ,title "
        ."  ,created_at  "
        ."  , flg_com "
        ."FROM      "
        ."  todo "
        ."WHERE "
        ."  no = :no "
    ;

    // Query 실행
    $stmt = $conn-> prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll();

     // 리턴
     return $result;   

    }




            // pk로 특정 게시글 삭제 처리
function db_delete_todo(&$conn, &$array_param) {
        // SQL
    $sql =
        " UPDATE todo"
        ." SET "
        ."  deleted_at = NOW() "
        ." WHERE "
        ."  no = :no "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    // return 
    return $stmt->rowCount();

}

function db_update_todo_no(&$conn, &$array_param) {
    $sql = 
        " UPDATE todo"
        ." SET "
        ."  flg_com = CASE WHEN flg_com = '0' THEN '1' ELSE '0' END "
        ." WHERE "
        ."  no = :no "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    // return 
    return $stmt->rowCount();
}
    
