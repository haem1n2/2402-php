<?php
// if로 만들어주세요.
// 성적
// 범위 :
// 100 : a+
// 90이상 100미만 : A
// 80이상 90미만 : B
// 70이상 80미만 : C
// 60이상 70미만 : D
// 60미만 : F
// 출력 문구 : "당신의 점수는 XXX점입니다. <등급>"
$num = 101; // 점수 저장용
$answer = "당신의 점수는".$num."점입니다.";
$answer1 = "잘못된 값을 입력 했습니다.";

/* if ($num === 100){
    echo $answer."<A+>";
 }
 else if ($num >= 90 && $num < 100){
    echo $answer."<A>";
 }
 else if ($num >= 80 && $num < 90){
    echo $answer."<B>";
 }
 else if ($num >= 70 && $num < 80){
    echo $answer."<C>";
 }
 else if ($num >= 60 && $num < 70){
    echo $answer."<D>";
 }
 else {
    if ($num > 100)
   echo $answer1;
    else{
    echo $answer."<F>";
    }
 }
 */

/* if ($num > 100) {
    echo $answer1;
}
else if ($num === 100){
    echo $answer."<A+>";
}
else if ($num >= 90 && $num < 100){
    echo $answer."<A>";
}
else if ($num >= 80 && $num < 90){
    echo $answer."<B>";
}
else if ($num >= 70 && $num < 80){
    echo $answer."<C>";
}
else if ($num >= 60 && $num < 70){
    echo $answer."<D>";
}
else {
    echo $answer."<F>";
}
*/

// 해답 
$grade =""; // 등급 저장용
$str_print = "당신의 점수는 %u점 입니다. <%s>";  //정상 출력 포맷
$msg = "잘못된 값을 입력 했습니다.";
if($num >= 0 && $num <= 100){
    if($num === 100) {
        $grade = "A+";
    } 
    else if($num >= 90) {
        $grade = "A";
    }
    else if($num >= 80) {
        $grade = "B";
    }
    else if($num >= 70) {
        $grade = "C";
    }
    else if($num >= 60) {
        $grade = "D";
    }
    else {
        $grade ="F";
    }
$msg = sprintf($str_print, $num, $grade); 
}
echo $msg;