<?php
// DB접속 정보

$dbHost     = "localhost"; // DB Host
$dbUser     = "root"; // DB 계정명
$dbPw       = "php505"; // DB 패스워드
$dbName     = "employees";  // DB명
$dbCharset  = "utf8mb4"; // DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset;

// PDO 옵션
$opt = [
    // prepared Statemnet로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
    PDO::ATTR_EMULATE_PREPARES      => false // DB에서 에뮬레이션 하게 설정
    // DEFAULT가 TRUE라서 FALSE로 고정 해야함.
    // PDO에서 예외를 처리하는 방식을 지정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    // DB의 결과를 저장하는 방식
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연상 배열로 배치
];

$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt);

$sql = " SELECT" 
        ."* "
        ."FROM "
        ." employees "
        ." LIMIT "
        // ." 10 " // del 240320
        ." 10 " // add 240320
        // " " 앞뒤는 띄어쓰기
        ;
$stmt = $conn->query($sql); // 쿼리 준비 + 실행
$result = $stmt->fetchAll(); // 질의 결과 패치
print_r($result);

$conn = null; // PDO 파기

