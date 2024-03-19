<?php
// 다른파일을 불러옴 여러번 불러오면 여러번 가져옴
include("./070_include2.php");
include("./070_includeones");


include_once("./070_indlude2.php");
echo my_sum(1, 2);

// include_once : 여러번 불러와도 한 번만 가져옴
