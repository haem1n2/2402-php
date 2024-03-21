<?php
// print_r($_GET);
// print_r($_GET["name"]);

//localhost/%ED%8C%8C%EC%9D%BC%EB%AA%85?name=hong&gender=M
// 도메인   / 파일명    ?파라미터
// 주민번호 같은 민감한건 보내면 안된다.

$question = "";
if(isset($_GET["q"])) {
    $question =$_GET["q"];
}

// 삼향연산자
// 변수 = 조건식 ? 참일 경우 : 거짓일 경우
$question = isset($_GET["q"]) ? $_GET["q"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>검색어를 입력하세요.</h1>

    <form action="/146_http_method_get.php" method="get">
    <!-- / : -->
    <input type= "text" name="q">
    <button type="submit">검색</button>
    </form>
    <br>
    <br>
    <?php
        if($question !== ""){
            echo "<h2>당신의 검색어는 <span style =\" color : red;\"> $question</span> 입니다.</h2>";
        }
    ?>
    <?php
        if($question !== ""){
    ?>      
            <h2>당신의 검색어는<span style = "color:blue;"> <?php echo $question ?></span> 입니다.</h2>
    <?php
        }
    ?>
</body>
</html>