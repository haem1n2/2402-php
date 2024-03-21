<?php

$id= "";
if(isset($_GET["id"])) {
    $id =$_GET["id"];
}

$pw = "";
if(isset($_GET["pw"])) {
    $pw =$_GET["pw"];
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
    <h1>검색어를 입력하세요</h1>
    <form action="./146_tng.php" method="get">
    <ul class none>
        <li><label for="id">아이디</label>
            <input type="text" name="id" id="id"required></li>
        <li><label for="pw">비밀번호</label>
            <input type="text" name="pw" id="pw"required>
            <input type="submit" value="로그인" name="submit" id="submit"></li>
    </ul>
    </form>
    <?php
    if($id !== ""){
        echo "<h2>당신의 ID는 <span>$id</span>입니다.</h2>";
    }
    ?>
    <?php
    if($pw !== ""){
        echo "<h2>당신의 PW는 <span>$pw</span>입니다.</h2>";
    }
    ?>
</body>
</html>