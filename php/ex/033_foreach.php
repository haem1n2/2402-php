<?php
// foreach : 배열을 루프하는데 특화된반복문, 배열의 길이만큼 루프
/*$arr =[9,8,7,6,5];

// 배열의 값만 이용할 경우
foreach($arr as $val) {
    echo $val."\n";
}

// 배열의 키와 값 모두 이용할 경우
foreach($arr as $key => $val) {
    echo "key : $key, value: $val\n";
}
*/
$arr = [
    ["name" => "홍길동", "age" => 20, "gender" => "남자"]
    ,["name" => "갑순이", "age" => 20, "gender" => "여자"]
    ,["name" => "갑돌이", "age" => 20, "gender" => "남자"]
];

$msg_fomat ="<h3>%s<h3>의 나이는 %d이고, 성별은 %s입니다.<br>";
// name의 나이는 age이고, 성별은 gender입니다.
/*foreach($arr as $item) {
    echo $item["name"]
    ."의 나이는".$item["age"]
    ."이고, 성별은 ".$item["gender"]
    ."입니다.\n";
}

$arr2 = [
    "name" => "홍길동"
    ,"age" => "20"
    ,"gender" => "남자"
];
*/

//아래 배열에서 foreach를 이용해 아래처럼 출력해 주세요.
// ID list
// meerkat1
// meerkat2
// meerkat3
$arr =[
    ["id" => "meerkat1", "pw" =>"php504"]
    ,["id" => "meerkat2", "pw" =>"php504"]
    ,["id" => "meerkat3", "pw" =>"php504"]
];
echo "Idlist\n";
foreach($arr as $item) {
    echo $item["id"]."\n";
}

// 배열의 값중 가장 큰 수를 구해주세요.
// 예시)
// $arr = [4,5,7,3,2,9];
// 위의 배열 중 가장 큰 수인 9가 출력 되어야 합니다.

$temp = 0;
/*$srt = "";
$arr = [];
$obj = null;
*/
$arr = [4,5,7,3,2,9,8];
foreach($arr as $val){
    if($temp < $val) {
        $temp = $val;
    }
}
echo $temp;

"\n";
$int = $arr[0];
$arr = [4,5,7,3,2,9,8];
foreach($arr as $val)
    if ($int > $val){
        $int = $val;
    }
echo $int;


// name의 나이는 age이고, 성별은 gender입니다.
/* foreach($arr as $item) {
    echo $item["name"]
    ."의 나이는".$item["age"]
    ."이고, 성별은 ".$item["gender"]
    ."입니다.\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($arr as $item){
            //printf($msg_fomat, $item["name"], $item["age"], $item ["gerder"]);
    ?>
        <h3><?php echo $item ["name"] ?></h3>
        <p>의 나이는  <?php echo $item["age"] ?>이고, 성별은 <?php echo $item["gender"]?>입니다.</p>
        <?php     
        }
    ?>
</body>
</html>
*/
