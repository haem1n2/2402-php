<?php
//trim(문자열) : 공백 제거 함수
$str = " 홍길동 ";
echo trim($str);

// strtoupper(문자열) : 영어 대문자 출력
echo strtoupper("asdawdf");
// strtolower(문자열): 영어 소문자 출력
echo strtolower("SDGWEG");

// str_replace(대상문자열, 변경 문자열, 대상 문자열) : 특정 문자를 치환
// 빈문자열 사용하면 문자 삭제 가능
echo str_replace("c", "Z", "abcdefg");

// mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str , 1, 4)."\n";
echo mb_substr($str, 2)."\n";
echo mb_substr($str, -2)."\n";
echo mb_substr($str, -5, 2)."\n";

// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
$str = "나는 홍길동 입니다.";
echo mb_strpos($str, "동")."\n";

if(mb_strpos($str, "ㅁ")){
    echo "포함됨";
}
else {
    echo "없어";
}