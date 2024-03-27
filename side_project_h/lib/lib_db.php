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
    function db_select_boards_cnt(&$conn){
            // sql 작성
            $sql =
            " SELECT "
            ." COUNT(no) as cnt "
            ." FROM "
            ." boards "
            ." WHERE "
            ." deleted_at IS NULL "
            ;
        }
    function db_select_boards_paging(&$conn, &$array_param) {
            $sql =
                " SELECT "
                ." no "
                ." ,title "
                ." ,created_at "
                ." FROM "
                ." boards "
                ." WHERE "
                ." deleted_at IS NULL "
                ." ORDER BY "
                ." no DESC "
                ." LIMIT 5 OFFSET 1 "
                ;
            // Query 실행
            $stmt = $conn->prepare($sql);
            $stmt->execute($array_param);
            $result = $stmt->fetchAll();
            
            // 리턴
            return $result;
        }
        
?>