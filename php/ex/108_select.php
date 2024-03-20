<?php

require_once("./lib_db.php");
    $limit = 5;

    try{
        $conn = db_conn();
    // 쿼리 작성
    // placeholder 셋팅이 없는경우
    
    // placeholder 셋팅이 필요한 경우
    $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset ";
    $sql_prepare = [
        "limit" => $limit
        ,"offset" => 10
    ];
    $stmt = $conn->prepare($sql); //쿼리 준비 
    $stmt->execute($sql_prepare); //쿼리 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
        "* "
        ."FROM "
        ." employees "
        ." LIMIT "
        // ." 10 " // del 240320
        ." 10 " // add 240320
        // " " 앞뒤는 띄어쓰기
        ;
     // 쿼리 준비 + 실행
     // 질의 결과 패치
    print_r($result);
} catch(Thorwable $e){
    echo "예외 발생 : ".$e->getMessage()."\n";
    //throw $th;
} finally{
    $conn = null; // PDO 파기
}
echo "------------------------------------\n";

// 사번 10001, 10003의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared starment
// try{
//     $CONN = db_conn();
 
// }
$arr_emp_no = [10003, 10004];
$limit = 1;
try {
    // POD 인스턴스 생성
    $conn = db_conn();

    $sql =
   " SELECT "
	." sal.salary "
	.", emp.emp_no "
	.", emp.birth_date "
    ."FROM employees emp "
	." JOIN salaries sal "
		." ON emp.emp_no = sal.emp_no "
  		." AND sal.to_date >= NOW() "
    ." WHERE " 
	." emp.emp_no IN( :emp_no1,:emp_no2)"
    ." limit :limit"   
;
$arr_prepare =[
    "emp_no1" => $arr_emp_no[0]
    ,"emp_no2" => $arr_emp_no[1]
    ,"limit" => $limit
];
$stmt = $conn->prepare($sql); //DB 질의 준비
$stmt->execute($arr_prepare); //DB 질의 실행
$result = $stmt->fetchAll(); // 질의 결과 패치
print_r($result);
} catch (\throwable $e) {
    echo "예외 발생 :".$e->getMessage()."\n";
} finally {
    $conn = null;
}