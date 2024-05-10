<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser(){
        // ---------------
        // 쿼리 빌더
        // ---------------
    //     $result = DB::select("select * from users where name =:name"
    //         ,['name' => '갑돌이']
    // );
    // $result = DB::select("select * from users where deleted_at is not null");
    //     return var_dump($result);

    // insert
    // $sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";
    // $data = ['김철수','admin4@admin.com', Hash::make('qwer1234!')];
    // DB::beginTransaction(); // 트랜잭션 시작
    // $result = DB::insert($sql, $data);
    // if(!$result) {
    //     DB::rollBack(); // 롤백 
    // } else {
    //     DB::commit(); //커밋
    // }

    //update 
    // $sql = 'UPDATE users SET deleted_at = null where id = ?';
    // $data = [5];
    // $result = DB::update($sql, $data);

    // delete
    // $sql = 'DELETE FROM users where id= ?';
    // $data = [6];
    // $result = DB::delete($sql, $data);

    // --------------------------
    // 쿼리 빌더 체이닝
    // --------------------------
    // users 테이블 모든 데이터 조회
    // selsect * from users;
    // $result = DB::table('users')->get();
    // // select * from users where name =?; ['홍길동']
    // $result = DB::table('users')->where('name' ,'=', '홍길동')->get();

    // // select * from users where id = ? or id =?; [3, 4]
    // $result = DB::table('users')->where('id', 3)->orwhere('id', 4)->get();
        

    // select * from users where name = '홍길동' and id = 3; ['홍길동', 3]
    $result = DB::table('users')
        ->where('name', '홍길동')
        ->where('id', 4)
        ->get();

    // select name from users order by name ASC;
    $result = DB::table('users')
        ->select('name')
        ->orderBy('name', 'ASC')
        ->get();

    // where 나머지 부터 ... 커밍 순 


    //select * from users where id in (?,?); [2,5]
    $result = DB::table('users')
    ->whereBetween('id',[2,5])
    ->get();

    // select * from users where deleted_at is null;
    $result = DB::table('users')
            ->whereNull('deleted_at')
            ->get();

    // 2023년에 가입한 사람만 출력
    // select * from users where year(created_at) = ?
    // select * from users created_at beetween 20230101000000 and 202312311235959
    $result = DB::table('users')
            ->whereYear('created_at', '2023')
            ->get();
    

    // 성별회원수
    $result = DB::table('users')
            ->select('gender', DB::raw('COUNT(gender) cnt'))
            ->groupBy('gender')
            ->having('gender', '=', 'M')
            ->get();
    
    // select id, name from users order by id limit ? offset 2; [1, 2]
    // $result = DB::table('users')
    //             ->select('id', 'name')
    //             ->orderBy('id',)
    //             ->limit(1)
    //             ->offset(2)
    //             ->get();
    // $reqData = ''; // 유저가 1또는 빈값인 데이터 전달
    // $result = DB::table('users')
    //             ->when($reqData, function($query, $reqData){
    //                 $query->where('id', $reqData);
    //             })
    //             // ->dd();


    // first() : 쿼리 결과에서 가장 첫번째 레코드만 변환 
    $result = DB::table('users')->first();
    // count() : 쿼리 결과의 레코드 수를 반환
    $result = DB::table('users')->count();
    //find($id) : 지정된 기본키의 해당하는 레코드를 반환
    $result = DB::table('users')->find(3);
    

    // insert 
    // $result = DB::table('users')->insert([
    //     'name' => '김영희'
    //     ,'email' => 'kim@admin.com'
    //     ,'password' => Hash::make('qwer1234!')
    //     ,'gender' => 'F'
    // ]);

    // update 
    // $result = DB::table('users')
    //     ->where('id', 8)
    //     ->update([
    //     'email' => 'kim@naver.com'
    // ]);
    
    // // delete
    // $result = DB::table('users')
    //             ->where('id', 8)
    //             ->delete();
    
    
    // ---------------------
    // Eloquent Model
    // ---------------------
    $result = User::all(); 
    //  $result = User::find(3);
    
    // insert
    $data = [
        'name' => '김영희'
        ,'email' => 'kim@naver.com'
        ,'password' => Hash::make('qwer1234!')
        ,'gender' => 'F'
    ];
    // $result = User::create($data);

    // update
    // DB::beginTransaction();
    // $target = User::find(14);
    // $target->gender = 'M';
    // $result = $target->save();
    // // DB::commit();

    // // delete
    // $result = User::destroy(14);

    // 소프트 딜리트 된 데이터 조회
    $result = User::withTrashed()->get(); // 소프트 딜리트 포함
    $result = User::onlyTrashed()->get(); // 소프트 딜리트만
    

    // 소프트 딜리트 된거 복원
    $result = User::where('id', 14)->restore();
    return var_dump($result);
    } 
    
}


