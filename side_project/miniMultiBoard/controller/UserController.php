<?php

namespace controller;

use model\UsersModel;
use lib\UserValidator;

class UserController extends Controller
{
    private $userInfo;

    public function getUserInfo($key) {
        return $this->userInfo[$key];
    }

    // 로그인 페이지로 이동 
    protected function loginGet()
    {
        return "login.php";
    }

    // 로그인 처리 
    protected function loginPost()
    {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"], "u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        //  유저 정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);


        // 유저 존재 유무 체크
        if (empty($resultUserInfo)) {
            // 에러메세지
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }


        // 세션에 u_id 저장         
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리 
        // TODO : 보드 리스트 게시판 타입 수정할때 같이 수정
        return "Location: /board/list";
    }

    // 로그아웃 처리 
    protected function logoutGet()
    {
        session_unset(); // 세션 파기 

        return "Location: /user/login";
        session_destroy();
    }

    // 회원 가입 페이지 이동
    protected function registGet()
    {
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost()
    {
        $requestData = [
            "u_email" => $_POST["u_email"], "u_pw"   => $_POST["u_pw"], "u_name" => $_POST["u_name"]
        ];

        // 유효성 체크 
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "regist.php";
        }

        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 이메일 중복 체크
        $selectData = [
            "u_email" => $requestData["u_email"]
        ];
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($selectData);
        if (count($resultUserInfo) > 0) {
            $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            return "regist.php";
        }

        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if ($resultUserInsert === 1) {
            $modelUsers->commit();
        } else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원가입에 실패했습니다."];
            return "regist.php";
        }

        return "Location: /user/login";
    }
    
    // 이메일 체크 처리 
    protected function chkEmailPost() {
        $requestData = [
            "u_email" => $_POST["u_email"]
        ];

        // response 데이터 초기화
        $responseArr = [
            "errorflg" => false
            ,"errorMsg" => ""
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
        } else {
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo = $modelUsers->getUserInfo($requestData);
            if (count($resultUserInfo) > 0) {
                $this->arrErrorMsg = ["이미 가입한 이메일입니다."];
            }
        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;

    }

    // 비밀번호 암호화 
    private function encryptionPassword($pw, $pk)
    {
        return base64_encode($pw . $pk);
    }

    // // 수정 페이지로 이동
    protected function updateget() {
        // 세션에서 사용자 식별자 가져오기
        $user_id = $_SESSION["u_id"];

        // 사용자 정보를 조회하는 메소드를 호출하여 사용자 정보를 가져옵니다.
        $modelUsers = new UsersModel();
        $this->userInfo = $modelUsers->getUserInfo(["u_id" => $user_id]);

       return  "update.php";
    }

    
     // 수정 처리
     protected function updatePost()
     {
         // 사용자 정보를 조회하는 메소드를 호출하여 사용자 정보를 가져옵니다.
         $modelUsers = new UsersModel();
         $this->userInfo = $modelUsers->getUserInfo(["u_id" => $_SESSION["u_id"]]);
         

         $requestData = [
            "u_pw"   => $_POST["u_pw"]
            ,"u_name" => $_POST["u_name"]
            ,"u_pw_why" => $_POST["u_pw_why"]
         ];

         $requestData1 = [
            "u_pw" => $_POST["u_pw"]
            ,"u_name" => $_POST["u_name"]
            ,"u_id" => $_SESSION["u_id"]    
         ];
 
         // 유효성 체크 
         $resultValidator = UserValidator::chkValidator($requestData);
         if (count($resultValidator) > 0) {
             $this->arrErrorMsg = $resultValidator;
             return "update.php";
         }
 

         // 비밀번호 암호화
         $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $this->userInfo["u_email"]);
         $modelUsers->beginTransaction();
         $requestUser = $modelUsers->UserUpdate($requestData1);

         if ($requestUser === 1) {
             $modelUsers->commit();
             return "Location: /board/list";

         } else {
             $modelUsers->rollBack();
             $this->arrErrorMsg = ["회원 정보 수정에 실패하였습니다."];
             return "update.php";
         }

     }

     // 강사님 따라한거
     // 회원 정보 수정 페이지로 이동
     protected function editGet() {
        // 회원 정보 습득
        $queryData = [
            "u_id" => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel();
        $this->userInfo = $modelUsers->getUserInfo($queryData);


        return "edit.php";
     }


     // 회원 정보 수정 처리 
     protected function editPost() {
        $requestData = [
            "u_name" => $_POST["u_name"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
        ];

        
        // 유저 정보 획득
        $selectData = [
            "u_id" => $_SESSION["u_id"]
        ];
        $modelUsers = new UsersModel();
        $this->userInfo = $modelUsers->getUserInfo($selectData);
        
        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
         if (count($resultValidator) > 0) {
             $this->arrErrorMsg = $resultValidator;
             return "edit.php";
         }
        // 유저 정보 업데이트
        $updataData = [
            "u_id" => $_SESSION["u_id"]
            ,"u_name" => $requestData["u_name"]
            ,"u_pw" => $this->encryptionPassword($requestData["u_pw"], $this->getUserInfo("u_email"))
        ];

        $modelUsers->beginTransaction();
        $resultUpdate = $modelUsers->updateUserInfo($updataData);
        if($resultUpdate !== 1) {
            $modelUsers->rollback();
            $this->arrErrorMsg = ["회원정보 수정 실패"];
            return "edit.php";
        } 

        $modelUsers->commit();

        return "Location: /board/boardList";
     }
}