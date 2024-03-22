<?php

$a = 100;
for ( $i=1; $i <= $a; $i++) {
    if ( $i % 3 !== 0 ) {
        echo $i."입니다.\n";
    }
    else {
        echo "\n";
    }
}

$arr = range(1, 100);

foreach ($arr as $key => $val) {
    if(($val % 3) === 0) {
        continue;
    }
    echo $val."입니다.\n";
}