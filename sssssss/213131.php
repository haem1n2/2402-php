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
for($i = 0; $i < 3; $i++){
    for($f = 1; $f < 4; $f++){
        echo "*";
    }
    for($w =1; $w < 4-$i; $w++){
        echo " ";
    }
    for($y = 1; $y <4; $y++){
        echo "*";
    }
    for($z =1; $z < 4-$y; $z++){
        echo " ";
    }
    echo "\n";
}