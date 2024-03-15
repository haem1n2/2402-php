<?php
// while 문
    $cnt = 0;
    while($cnt < 3){
        echo "count : $cnt \n";
        $cnt++;
    }

    $cnt = 0;
    while(true) {
        echo "$cnt \n";
            if($cnt === 3){
                break;
            }
            $cnt++;
    }

    // while 를 이용해서 2단을 출력해 주세요.
    // 2 x 1 = 2
    // 2 x 2 = 4
    // ...
    // 2 x 9 = 18

   /* $dan = 2;
    $dan1 = 0;
    while($dan1 < 9){
        $dan1++;
        echo $dan." x ".$dan1." = ".($dan * $dan1)."\n";
     }   
    */
     
    
    $dan2 = 1;
    $dan3 = 0;
    while($dan2 < 10){
        echo $dan2."단\n";
     while($dan3 < 9){
        $dan3++;
        echo $dan2." x ".$dan3." = ".($dan2 * $dan3)."\n";
     }
     $dan2++;
    $dan3 = 0;
    }

    //해답
    $num = 1;
    while($num < 10) {
        echo "2 X ". $num." = ".(2 * $num)."\n";
        $num++;
    }

    $dan4 = 2;
    $multi_num = 1;
    while($dan4 < 10) {
        $multi_num =1;
        echo $dan4."단\n";
        while($multi_num < 10){
            echo $dan4." x ".$multi_num." = ".($dan4 * $multi_num)."\n"; 
            $multi_num++;
        }
        $dan4++;

    }