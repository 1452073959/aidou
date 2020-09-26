<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Banner;
use App\Models\Bulletin;
use App\Models\Lottery;
use App\Models\Project;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;

class ElseController extends Controller
{
    //

    public function lottery()
    {
        $data = Lottery::all();
        return $this->success($data);
    }

//    public function box(Request $request)
//    {
//        $rand = rand(10, 30);
//        if ($request->has('pid')) {
//            $flight = User::find(request('pid'));
//            $flight->diamondnum = ($flight['diamondnum'] += 0) + $rand;
//            $flight->save();
//        };
//        $user = auth('api')->user();
//        if ($user['box'] <= 0) {
//            return $this->success('不能再开了');
//        }
//        if (!$request->has('pid')) {
//            $user->box = $user['box'] - 1;
//            $user->save();
//            return  $this->success(['boxnum' => $user['box'], 'rand' => $rand]);
//        };
//        if($request->has('and')){
//            $user->box = $user['box'] - 1;
//            $user->save();
//            return  $this->success(['boxnum' => $user['box'], 'rand' => $rand]);
//        }
//
//    }

    public function box(Request $request)
    {
        $rand = rand(50, 100);
        $rand1 = rand(100, 150);
        $user = auth('api')->user();
        //开启分享箱子
        if ($request->has('pid')) {
            //分享人增加
            $flight = User::find(request('pid'));
            $flight->diamondnum = ($flight['diamondnum'] += 0) + $rand;
            $flight->save();
            //开箱人增加
            $user->diamondnum = ($user['diamondnum'] += 0) + $rand1;
            $user->save();
            return $this->success(['rand' => $rand]);
        };
        if ($user['box'] <= 0) {
            return $this->success('不能再开了');
        }
        //发起分享箱子  减次数 不加钻石
        if($request->has('and')){
            $user->box = $user['box'] - 1;
            $user->save();
            return  $this->success(['boxnum' => $user['box']]);
        }
        //免费第一次箱子
        if($user['box']==6){
            $user->box = $user['box'] - 1;
            $user->diamondnum = ($user['diamondnum'] += 0) + $rand;
            $user->save();
            return  $this->success(['boxnum' => $user['box'], 'rand' => $rand]);
        };
    }

    public function draw()
    {
        $user = auth('api')->user();
        if ($user['drawamount'] <= 0) {
            return $this->success('不能再抽了');
        }
        $user->drawamount = $user['drawamount'] - 1;
        $user->save();
        return $this->success(['drawamount' => $user['drawamount']]);
    }

    //banner
    public function banner()
    {
        $banner = Banner::all();
        return $this->success($banner);
    }

    //公告
    public function bulletin()
    {
        $bulletin = Bulletin::get();
        return $this->success($bulletin);
    }

    //项目
    public function project()
    {
        $project = Project::get();
        return $this->success($project);
    }
//    打榜明细
    public function rankshow()
    {
        $user = auth('api')->user();
        $data=Ranking::with('celebrity','user')->where('user_id',$user['id'])->take(50)->get();
        return $this->success($data);
    }




}
