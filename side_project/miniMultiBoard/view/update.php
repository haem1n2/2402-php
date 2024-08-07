<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정 페이지</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="/view/bootstrap/css/bootstrap.css">
    <script src="/view/bootstrap/js/bootstrap.js" defer></script>
    <script src="/view/bootstrap/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="/view/bootstrap/css/myCommon.css">
</head>
<body class="vh-100">
   <?php require_once("view/inc/header.php"); ?>

      <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px" action="/user/update" method="post">
        <?php require_once("view/inc/errorMsg.php");
        ?>
        <H2>회원 정보 수정</H2>
        <label for="u_name" class="form-label">이름</label>
        <input type="text" class="form-control mb-3" id="u_name" name="u_name"  value="<?php echo $this->getUserInfo('u_name');?>">

        <label for="u_pw" class="form-label mb-3">비밀번호</label>
        <input type="password" class="form-control mb-3" id="u_pw" name="u_pw">

        <label for="u_pw" class="form-label mb-3">비밀번호 확인</label>
        <input type="password" class="form-control mb-3" id="u_pw_why" name="u_pw_why">

        <button id="my-btn-update" type="submit" class="btn btn-dark mb-3">수정</button>
        <a href="/board/list" class="btn btn-secondary float-end">취소</a>
        </form>
      </main> 

      <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
</body>
</html>