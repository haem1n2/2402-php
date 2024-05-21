<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyEncryFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyEncrypt';
    }
}