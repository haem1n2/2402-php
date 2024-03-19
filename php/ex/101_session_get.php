<?php
// 세션 시작 : 세션 시작 전에 출력 처리가 있으면 안됨
session_start();

// 저장된 세션 데이터 획득
echo $_SESSION["my_session1"];