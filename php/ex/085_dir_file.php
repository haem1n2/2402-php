<?php
// 디렉토리 존재여부 체크
if(is_dir("./test")){
    echo "이미 존재하는 디렉토리\n";
}
else {
    echo "없는 디렉토리\n";
// 777로 주면 모든 계정이 다 관리자권한으로 가능
// 666은 읽기 쓰기만 가능
// 444는 읽기만 가능
$result = mkdir("./test", 777);
if($result) {
    echo "디렉토리 생성 성공\n";
}
else {
    echo "디렉토리 생성 실패\n";
}
}

// 디렉토리 삭제
$result = rmdir("./test");
if($result) {
    echo "디렉토리 삭제 성공\n";
}
else {
    echo "디렉토리 삭제 실패\n";
}

// 디렉토리 열기 및 읽기
$open_dir = opendir("./"); // 디렉토리 열기
while($item = readdir($open_dir)) {
    echo $item."\n";
}

// 디렉토리 닫기
closedir($open_dir);

// -----------------------------

// 파일 오픈
// 읽기전용으로 만들면 기존의 파일이 없으면 열리지않는다 ("r")
// 쓰기전용으로 만들면 기존의 파일을 생성하면서 파일을 연다  기존 내용 보존("a")
// 기존 내용 삭제 ("w")
$file = fopen("./999_test.php", "w");
if($file) {
    echo "파일 오픈 성공\n";
    // 파일 내용 데이터 쓰기
    fwrite($file, "글쓰기 테스트\n");
    // 파일 닫기
    fclose($file);
}
else {
    echo "파일 오픈 실패\n";
}

// 파일 삭제
unlink("./999_test.php");