<?php
// int : 숫자, 정수
echo 123;
var_dump(123);

// double : 실수
var_dump(3.141592);

// string : 문자열
var_dump("asdf");
var_dump('qwer');

// boolean : 논리
var_dump(true, false);

// NULL
var_dump(NULL);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$obj = new datetime(); 
var_dump($obj);

// 형변환 : 변수 앞에 (데이터타입) 작성
var_dump((int)'123');
var_dump((string)456);
var_dump((int)"abc"); // 이렇게는 하면 안된다.