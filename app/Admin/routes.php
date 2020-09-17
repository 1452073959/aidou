<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('celebrity', 'CelebrityController');
    //用户列表
    $router->resource('user', 'UserController');
    //抽奖奖品
    $router->resource('lottery', 'LotteryController');
    //banner
    $router->resource('banner', 'BannerController');
    //钻石树
    $router->resource('speed', 'SpeedController');
});
