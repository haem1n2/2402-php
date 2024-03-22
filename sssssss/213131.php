<?php

for($i = 1; $i < 4; $i++){
    for($f = 1; $f < 4-$i; $f++){
        echo " ";
    }
    for($y = 1; $y < $i+1; $y ++){
        echo"*";
    }
    for($z = 1; $z < $i+1; $z++){
        echo "*";
    }
    echo "\n";
}
for($i = 1; $i <= 3; $i++){
    for($f = 1; $f <= 3; $f++){
        echo " ";
    }
    for($y = 1; $y <= (4-2*$i); $y++){
        echo "*";
    }
    for($z =1; $z <= $i; $z++){
        echo "*";
    }
    echo "\n";
}