<?php
// 변수(Variable)
$str = "안녕 php";

echo $str;

// 한글로도 설정이 가능하나, 사용하지 말자
$num1 = 1;
echo $num1;

$user_name;

$Num = 1;
$num = 2;
echo $Num, $num;

// 네이밍 기법
// 스네이크 기법
$user_name;


// 카멜 기법
$userName;

echo "\n";
// 상수 : 절대 변하지 않는 값
$num = 1;
$num = 2;

define("USER_AGE", 20);

define("USER_AGE", 30); // 이미 선언된 상수이므로 경고 일어나고 값이 바뀌지않음

echo USER_AGE;

echo "\n";

// 점심메뉴
// 탕수육 9000원 
// 햄버거 10000원
// 빵 2000원
$str = "점심메뉴";
echo $str;
echo "\n";  
$str = "탕수육 9000원";
echo $str;
echo "\n";
$str = "햄버거 10000원";
echo $str;
echo "\n";
$str = "빵 2000원";
echo $str;
echo "\n";

$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hamburger = "햄버거 10000원\n";
$bread = "빵 2000원\n";
echo $menu,$tang,$hamburger,$bread;

define("MENU", "점심메뉴\n");
echo MENU;

// 스왑
$swap1 = '곤드레밥';
$swap2 = '짜장면';
$tmp ="";

$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;

echo $swap1;
echo $swap2;