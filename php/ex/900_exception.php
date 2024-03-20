<?php
// try, catch, finally

try {
    // 예외가 발생할 로직을 작성
        $i = 5 / 0;
        echo "\$i의 값은 : ";
        // "\" : 이스케이프문자 뒤에 입력하는 문자는 문자열로 인식
        echo $i;
}
catch(\Throwable $e) {
    // 예외가 발생했을 때 처리를 작성
    echo "예외 발생\n".$e->getMessage()."\n";
}

finally {
    // 예외 발생 여부와 상관없이 무조건 마지막에 실행
    // finally는 생략 가능

    echo "finally\n";
}
echo "계산 완료";