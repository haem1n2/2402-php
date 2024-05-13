<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        //유효성 검사
        $request->validate([
            'email' => ['required','email','max:50']
            ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9!@]+$/'
        ]);

        // Validator 객체 생성으로 체크하는 방법(자동으로 이전 페이지로 이동x)
        // $validator = Validator::make(
        //     $request->only('email', 'password')
        //     ,[
        //         'email' => ['required', 'email', 'max:50']
        //         ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
        //     ]
        // );

        // if($validator->fails()) {
        //     return redirect()->route('get.login')->withErrors($validator->errors());
        //     }

        // ----------------
        // 유저 정보 습득
        // ----------------
        $resultUserInfo = User::where('email', $request->email)->first();
        $errorMsg = '';
        if(is_Null($resultUserInfo)) {
            // 회원 존재 여부 체크 
            $errorMsg = '존재하지않는 회원입니다.';
        } else {
            // 비밀번호 일치 체크
        } if(!(Hash::check($request->password, $resultUserInfo->password))) {
            $errorMsg = '비밀번호가 일치하지 않습니다.';
        }
        if($errorMsg !== '') {
            return redirect()->route('get.login')->withErrors($errorMsg);
        }

        // ----------------
        // 유저 인증 처리
        // ----------------
        Auth::login($resultUserInfo);
        // Auth::id() : 로그인한 유저 pk 획득
        // Auth::user() : 로그인한 유저 정보 획득
        // Auth::check() : 현재 로그인 중인지 체크 

        return redirect()->route('board.index');
    }

        // 로그아웃처리
        public function logout(Request $request) {
            Auth::logout(); // 로그아웃

            // Session 객체이용
            Session::invalidate(); // 기존 세션의 모든 데이터를 제거하고 새로운 세션 ID를 발급
            Session::regenerateToken(); // CSRF 토큰 재발급

            // // request 객체의 session 메소드 이용
            // $request->session()->invalidate();
            // $request->session()->regenerateToken();

            return redirect()->route('get.login');
        }
    
}
