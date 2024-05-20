<?php

namespace App\Utils;

use Illuminate\Support\Facades\Validator;

abstract class MyValidate {
    protected $validateList;

    public function myValidate($chkData) {
        $validateItem = [];

        // 유효성 체크 리스트 재구성
        foreach($chkData as $key => $val) {
            $validateItem[$key] =$this->validateList[$key];
        }

        // 유효성 검사
        return Validator::make($chkData, $validateItem);
    }
}