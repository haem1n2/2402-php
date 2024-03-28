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
?>