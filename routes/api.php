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
        //我参与的应援
        $api->get('participant','Api\AssistanceController@participant');

        //我发起的应援
        $api->get('myassistance','Api\AssistanceController@my');
        // 我的签到
        $api->get('sign', 'Api\UserController@sign');


        //拼呗
        //项目发起
        $api->post('spellstore','Api\SpellController@store');
        //手机号解密
        $api->post('phone', 'Api\Dccontroller@phone');

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
    $api->get('swoole', 'Dccontroller@swoolecurl');

    //模板消息
    $api->get('subscription', 'UserController@subscription');
    //模板消息2
    $api->get('subscription2', 'UserController@subscription2');
    //增加票数
    $api->get('restrank', 'ListController@restrank');

     //固定广告位id，模版id
    Route::any('advertisings','Api\ElseController@advertisings');
//应援列表
    //项目列表1待审核2.审核完成
    $api->get('assistancelist','AssistanceController@assistancelist');
    //        项目详情参数传id
    $api->get('assistanceshow','AssistanceController@assistanceshow');
    //参与应援参数传id
    $api->post('assistanceparticipation','AssistanceController@assistanceparticipation');
    //最近五条群集结任务
    $api->get('massfive','MassController@five');
    //设置(背景图
    $api->get('setting','ElseController@setting');
    //投诉接口
    $api->post('complaint','ElseController@complaint');
//测试路由
    Route::get('version', function() {
        return 'this is version v1';
    })->name('version');
});

