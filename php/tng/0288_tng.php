<?php

for($i = 0; $i < 5; $i++) {
    echo "*****\n";
}

for($i = 0; $i < 5; $i++) {
    for($z = 0; $z <= $i; $z++){
    echo "*";
    }
    echo "\n";
}

$num = 5;
for($i = 1; $i <= $num; $i++){
    $cnt_space = $num - $i;
    // for문 1개 +if문 이용
    for($z = 1; $z <= $num; $z++) {
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n"; 
}

for ($i=0; $i<$num; $i++){
    for($z=$num-1; $z>=0; $z--){
        if($z<=$i){
            echo "*";
        }
        else{
            echo " ";
        }
    }
    echo "\n";
}

// for문 2개 이용

for ($i = 0; $i < $num; $i++) {
    // 공백찍는 for문
    for($z = 1; $z < $num - $i; $z++){
        echo " ";
    }
    // 별찍는 for문
    for($f = 0; $f <= $i; $f++){
        echo "*";
    }
    echo "\n";
}