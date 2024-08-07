<?php
namespace model;

class BoardsModel extends model {
    public function getBoardList($paramArr) {
        try {
            $sql = 
                " SELECT "
                ." b_id  "
                ."  ,b_title "
                ."  ,b_content "
                ."  ,b_img "
                ."  FROM "
                ."  boards "
                ."  WHERE "
                ."  b_type = :b_type"
                ."  AND deleted_at is null "
                ." ORDER BY "
                ."  b_id DESC"
                ; 

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            echo "BoardsModel -> getBoardList, ".$th->getMessage();
            exit;
        }
    }


    // 게시글 작성 
    public function addBoard($paramArr) {
        try{
            $sql =
            " INSERT INTO boards("
            ." u_id "
            ." ,b_type "
            ." ,b_title "
            ." ,b_content "
            ." ,b_img "
            ." ) "
            ." VALUES ( "
            ." :u_id "
            ." ,:b_type "
            ." ,:b_title "
            ." ,:b_content "
            ." ,:b_img "
            ." ) "
            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->rowCount();
        } catch(\Throwable $th) {
            echo "BoardsModel -> addBoard(), ".$th->getMessage();
            exit;
        }
    }

    // 게시글 조회
    public function getBoard($paramArr) {
        try {
            $sql = 
            " SELECT "
            ."  b_id "
            ." ,b_title "
            ." ,b_content "
            ." ,b_img "
            ." ,u_id "
            ." FROM "
            ." boards "
            ." WHERE "
            ." b_id = :b_id "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();
            return $result;
        } catch(\Throwable $th) {
            echo "BoardsModel -> getBoard(), ".$th->getMessage();
            exit;
        }
    }

    // 삭제 처리
    public function deleteBoard($paramArr) {
        try{
            $sql =
                " UPDATE boards "
                ." SET "
                ." deleted_at = NOW() "
                ." WHERE "
                ." b_id =:b_id "
                ." AND u_id = :u_id "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);

            return $stmt->rowCount();
        } catch(\Throwable $th) {
            echo "BoardsModel -> deleteBoard(), ".$th->getMessage();
            exit;
        }
        
    } 
}