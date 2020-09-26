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

        //钻石兑换票
        Route::post('conversion', 'Api\UserController@conversion');
        //d打榜
        Route::post('rankadd', 'Api\ListController@rankadd');
        Route::get('rankshow', 'Api\ElseController@rankshow');
        //打榜明细
        //本人投过票的
        $api->any('merank', 'Api\ListController@merank');
        //钻石接口
        $api->get('collect', 'Api\TreeController@collect');
        //收取钻石
        $api->get('take', 'Api\TreeController@take');
        //s升级
        $api->get('upgrade', 'Api\TreeController@upgrade');

        //任务列表
        Route::get('task', 'Api\TaskController@list');
        //领取积分
        Route::post('gain', 'Api\TaskController@gain');
//        完成任务
        Route::post('perform', 'Api\TaskController@perform');

        //群集结发起
        Route::post('mass', 'Api\MassController@mass');
        //群集结参与
        Route::post('participation', 'Api\MassController@participation');

        //开箱子
        $api->any('box', 'Api\ElseController@box');
        //抽奖
        $api->any('draw','Api\ElseController@draw');
        //项目选择
        $api->get('project','Api\ElseController@project');
        //项目发起
        $api->post('assistance','Api\AssistanceController@assistance');
        //项目列表1待审核2.审核完成
        $api->get('assistancelist','Api\AssistanceController@assistancelist');
//        项目详情参数传id
        $api->get('assistanceshow','Api\AssistanceController@assistanceshow');
        //参与应援参数传id
        $api->post('assistanceparticipation','Api\AssistanceController@assistanceparticipation');
        //我的应援
        $api->get('myassistance','Api\AssistanceController@my');
        // 我的签到
        $api->get('sign', 'Api\UserController@sign');


        //拼呗
        //项目发起
        $api->post('spellstore','Api\SpellController@store');


    });

    // 登录
    $api->any('logincode', 'Dccontroller@wechat');
    //刷新token
    $api->get('token', 'Dccontroller@tokenupdate');
    //排行榜
    $api->any('rank', 'ListController@rank');
    //时间
    $api->any('date', 'ListController@date');
    //获取某一周的开始日期和结束日期
    $api->any('weekday', 'ListController@w');
    //群集结查询
    Route::get('massquery', 'Api\MassController@massquery');
    //抽奖奖品
    $api->any('lottery', 'ElseController@lottery');

    //获取明星排名
    $api->any('celeberrank', 'ListController@celeberrank');
    //最后给明细投票的五个人
    $api->any('lastfans', 'ListController@lastfans');
    //公告
    Route::get('bulletin','Api\ElseController@bulletin');
    //用户信息
    Route::get('user','Api\UserController@usershow');
    //banner
    $api->any('banner', 'ElseController@banner');
    //粉丝榜
    $api->any('fanlist', 'ListController@fanlist');

    //后台用
    $api->get('cate', 'AssistanceController@admincate');
    //搜索
    $api->get('search', 'ListController@search');
    $api->get('and', 'ListController@and');
    //手机号解密
    $api->get('phone', 'Dccontroller@phone');


    Route::get('version', function() {
        return 'this is version v1';
    })->name('version');
});

