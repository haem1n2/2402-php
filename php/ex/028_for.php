<?php

// for 문
// 특정 처리를 반복해서 구연할때 사용하는 문법
for ($i = 0; $i < 3; $i++) {
    // 반복할 처리
    echo $i."번째 루프\n";
}
echo "\n";
// 총 10번 도는 루프문을 만들어주세요.
// 예) if,break 3에서 멈춤
for ($i = 0; $i < 10; $i++) {
    if($i === 3){
        break;
    }
    echo $i."번째 루프\n";
}
echo "\n";
// continue : continue 아래의 처리를 건너뛰고 다음루프로 진행
for ($i = 0; $i < 10; $i++) {
    if($i === 3 || $i === 6 || $i === 9){
        continue;
    }
    echo $i;
}

// 배열 루프 
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];
}
echo"\n";

// 다중루프
for($i = 1; $i < 3; $i++) {
    echo "1번 loop :".$i."번째\n";
    for ($z = 1; $z < 3; $z ++) {
        echo "\t2번 loop :".$z."번째\n";
    }
}
echo"\n";

// 구구단 2단 출력
// 예시)
// 2 x 1 = 2
// 2 x 2 = 4
// ...
// 2 x 9 = 18

$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++){
    $msg_line = $dan." x ".(string)$multi_num." = ".(string)($dan * $multi_num)."\n";
    echo $msg_line;
}

// 구구단 2~9단을 출력
// 예시)
// ** 2단 **
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// ** 3단 **
// 3 X 1 = 3
// 3 X 2 = 6
// ...
// 9 X 8 = 72
// 9 X 9 = 81
for($dan = 2; $dan < 10; $dan++){
    echo "** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        $msg_line = $dan." X ".$multi_num." = ". ($dan * $multi_num);
        echo $msg_line."\n";
    }
}
