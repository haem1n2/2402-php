<?php
// 연결 연산자
// 숫자도 문자로 바꿔줘야 에러가 적게난다.
$str1 = "안녕,";
$str2 = "PHP!!";
$num = 1111;
echo $str1.$str2.(string)$num;

//출력 : "안녕, 하세요!~"
$str1 = "안녕";
$str2 = "하세요!";
echo $str1.", ".$str2."~";
