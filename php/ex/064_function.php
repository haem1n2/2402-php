<?php
function my_sum($num1, $num2){
    // num1,num2 받는값. 파라미터(매개변수)
    return $num1 +$num2;

}

// echo my_sum(123, 213);
// (1, 2 : 아규먼트(인수))

// 파라미터 default 설정

/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @return int 합계 
 */
function my_sum2(int $num1, int $num2 = 10){
    return $num1 + $num2;
}
"\n";
// 하나만 입력하면 디폴트값 + num
echo my_sum2(5)."\n";;
 // -, *, /, % 를 해주는 각각의 함수를 만들어주세요.
"\n";
function my_minus2(int $num1, int $num2){
    return $num1 - $num2;
}
echo my_minus2(5, 10)."\n";

function my_multip(int $num1, int $num2){
    return $num1 * $num2;
}
echo my_multip(5, 10)."\n";
function my_division(int $num1, int $num2){
    return $num1 / $num2;
}
echo my_division(5, 10)."\n";
function my_remind(int $num1, $num2){
    return $num1 % $num2;
}

function test(string $str) {
    $str = "test()에서 변경";
    return $str;
}

$str = "처음 정의";
$str = test($str);
echo $str;
// 같은 이름이여도 함수마다 저장되는 값이 다름

"\n";
// 가변 길이 파라미터
// 파라티머로 받은 모든 수를 더하는 함수를 만들어 주세요
/*function my_sum_all(...$numbers){
    $sum = 0;
   // $numbers = func_get_args(); // php 5.5 이하
    print_R($numbers);
    foreach($numbers as $val){
        $sum = $val;
        $num_1 = $sum + $val;
        $sum =$numbers + $val;
    }
    return $num_1;
}

echo my_sum_all(1,5,7);
*/
// 해답
function my_sum_all2(...$numbers) {
    $sum = 0;
    foreach($numbers as $val) {
        $sum += $val;
    }
    return $sum;
}
echo my_sum_all2(5,4,5,6);

/* $arr = [4,5,7,3,2,9,8];
foreach($arr as $val){
    if($temp < $val) {
        $temp = $val;
    }
}
echo $temp;
*/

// 참조 전달
function test_v($num) {
    $num = 3;
}
function test_r($num) {
    $num = 5;
}
$num = 0;
test_v($num);
echo $num;
echo "\n";
// 참조 변수
$a = 1;
$b = $a;
$b = 3;

 echo $b;