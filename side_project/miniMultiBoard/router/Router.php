<?php 
namespace router;

use controller\UserController;
use controller\BoardController;

// 라우터 : 유저의 요청을 분석해서 해당 controller로 연결해주는 클래스
class Router{
    // 생성자
    public function __construct() {
    // URL 규칙
    //      1. 회원 정보 관련 URL
    //      user/[액션]
    //      ex) 로그인 : 도메인/user/login
    //      ex) 회원가입 : 도메인/user/regist
    // 2.게시판 관련 URL
    //      board/[액션]
    //      ex) 리스트 : 도메인/board/list
    //      ex) 수정 : 도메인/board/edit
        $url = $_GET['url'];   // url 획득
        $httpMethod = $_SERVER["REQUEST_METHOD"]; //HTTP 메소드 획득
        
        // url 체크
        if($url === "user/login") {
            if($httpMethod === "GET"){
                new UserController("loginGet");
            } else {
                new UserController("loginPost");
            }
        } else if($url === "board/list") {
            // 게시글 페이지 관련
            if($httpMethod === "GET"){
                new BoardController("listGet");
            } 
        } else if($url === "user/logout") {
            // 로그아웃 처리 
            if($httpMethod === "GET") {
                new UserController("logoutGet");
            }
        } else if($url === "board/add") {
            // 게시글 작성 관련
            if($httpMethod === "POST") {
                new BoardController("addPost");
            }
        } else if($url === "board/detail") {
            // 상세 페이지
            if($httpMethod === "GET") {
                new BoardController("detailGet");
            }
        } else if($url === "user/regist") {
            // 회원 가입 페이지
            if($httpMethod === "GET")  {
                new UserController("registGet");
            } else {
                new UserController("registPost");
            }
        } else if($url === "user/email") {
            // 이메일 중복 체크
            if($httpMethod === "POST") {
                new UserController("chkEmailPost");
            }
        } else if($url === "board/delete") {
            // 게시글 삭제 처리
            if($httpMethod === "POST") {
                new BoardController("deletePost");
            }
        } else if($url === "user/update") {
            // 회원 수정 페이지
            if($httpMethod === "GET") {
                new UserController("updateget");
            } else {
                new UserController("updatePost");
            }
            // 강사님 따라한거
        } else if($url === "user/edit") {
            // 회원 정보 수정 
            if($httpMethod === "GET") {
                new UserController("editGet");
            } else {
                new UserController("editPost");
            }
        }

         // 예외 처리
    echo "잘못된 URL : ".$url;
    exit;
    } 

}



