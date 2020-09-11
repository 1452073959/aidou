<?php

use Illuminate\Http\Request;



$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1', [
//    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    //需要登录
    Route::middleware('jwt.auth')->group(function ($api) {
        Route::get('cardlist', 'Api\Discountuser@kabiao');
        //
        //添加卡
        Route::post('discount', 'Api\Discountuser@add');

    });

    // 登录
    $api->any('logincode', 'Dccontroller@wechat');
    $api->any('rank', 'Dccontroller@rank');
    //用户信息
    Route::get('user','Api\WechatController@usershow');
    //刷新token
    $api->get('token', 'WechatController@tokenupdate');

    Route::get('version', function() {
        return 'this is version v1';
    })->name('version');
});

