<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****

for($star = 0; $star < 5; $star++){
    echo "*****\n";
}

"\n";
"\n";
// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

$arr = ["*","**","***","****","*****"];
$loop = count($arr);
for($star = "0"; $star < count($arr);  $star++){
    echo $arr[$star]."\n";

}

echo"\n";
$arr = ["    *","   **","  ***"," ****","*****"];
$loop = count($arr);
for($star = "0"; $star < count($arr);  $star++){
    echo $arr[$star]."\n";
}
echo "\n";

for($i = 0; $i < 5; $i++){
    for($f = 1; $f < 6; $f++){
        echo "*";
    }
    echo "\n";
}
echo "\n";
for($i = 1; $i < 6; $i++){
    for($f = 1; $f <= $i; $f++){
        echo "*";
    }
    echo"\n";
}

echo "\n";
for($i = 1; $i < 6; $i++){
    for($f = 1; $f < 6-$i; $f++){
        echo " ";
    }
    for($k = 1; $k < $i+1; $k++){
        echo"*";
    }
        if($f > 100){
            break;
        }
        echo "\n";
    }
    echo"\n";
