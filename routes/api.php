<?php

use Illuminate\Http\Request;



$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1', [
//    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    //需要登录
    Route::middleware('jwt.auth')->group(function ($api) {

        //用户增加票/钻石接口
        Route::post('useradd', 'Api\UserController@updateuser');
        //d打榜
        Route::post('rankadd', 'Api\ListController@rankadd');
        //本人投过票的
        $api->any('merank', 'ListController@merank');
    });

    // 登录
    $api->any('logincode', 'Dccontroller@wechat');
    //刷新token
    $api->get('token', 'WechatController@tokenupdate');
    //排行榜
    $api->any('rank', 'ListController@rank');
    //时间
    $api->any('date', 'ListController@date');
    //获取某一周的开始日期和结束日期
    $api->any('weekday', 'ListController@w');

    //抽奖奖品
    $api->any('lottery', 'ElseController@lottery');
    //开箱子
    $api->any('box', 'ElseController@box');
    //获取明星排名
    $api->any('celeberrank', 'ListController@celeberrank');
    //用户信息
    Route::get('user','Api\UserController@usershow');
    //banner
    $api->any('banner', 'ElseController@banner');
    //粉丝榜
    $api->any('fanlist', 'ListController@fanlist');


    Route::get('version', function() {
        return 'this is version v1';
    })->name('version');
});

