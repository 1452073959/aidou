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
            //分享人增加钻石 且减少开箱子数
            $flight = User::find(request('pid'));
            $flight->diamondnum = ($flight['diamondnum'] += 0) + $rand;
            if($flight['box']== $flight['boxtwo']+1 ){
                $flight->box = $flight['box'] - 1;
            }
            $flight->save();
            //开箱人增加
            $user->diamondnum = ($user['diamondnum'] += 0) + $rand1;
            $user->save();
            return $this->success(['rand' => $rand]);
        };
        if ($user['box'] <= 0) {
            return $this->success('不能再开了');
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

    // 固定广告
    public function advertisings(Request $request)
    {
      $num = $request->input('acid');   
      if($num==1){
           $data = [
             'qid'=>'RdSQCKuMqgJJaVbL_h6uEnpfWp89sP4gq9cgCiskr-A',
             'did'=>'eF7rzChPMPR1lN6Pqv6Ql7sbZ9fRrtVZMYtcbh6Vkg8',
             'cvideo'=>'adunit-9a588648b4869e3e',
             'jvideo'=>'adunit-747c9561d36154bb',
             'svideo'=>'adunit-74ef8c5e65fa6fa9'
            ];
        return $this->success($data);
      }
       if($num==2){
           $data = [
             'qid'=>'geOTQqUwnFQ6Arl0tTB6JIWPoI_SJmXqKD3W33EYJyc',
             'did'=>'ZCMFRPTfPz1M9ZWNIpSlbwz7wUHWL6Ub05H6_25l5YM',
             'cvideo'=>'adunit-aad071cc0398117e',
             'jvideo'=>'adunit-da654579930d3a20',
             'svideo'=>'adunit-6c64433e652cff21'
            ];
        return $this->success($data);
      }
        if($num==3){
           $data = [
             'qid'=>'sBEMFxD3H1sI3Le9NT9QBn08PMFTvtfyLKgYXsIeScQ',
             'did'=>'7TVQHrsldNAKJB-_yWBYBiIX3iLxcmTB-7FHKiuV-wM',
             'cvideo'=>'adunit-83a0781d2e352c0b',
             'jvideo'=>'adunit-8140d013bbbbe563',
             'svideo'=>'adunit-25a994dce4f98013'
            ];
        return $this->success($data);
      }
        if($num==4){
           $data = [
             'qid'=>'psJgJbHDyW5WYZyML2ORdBY-o5Qv4MBt2MCN75KmFwA',
             'did'=>'OOinQMEGxpKc5NMB4epzs9BGNSgszEWOtfMcA2Z8aEc',
             'cvideo'=>'adunit-042c8e3730a335da',
             'jvideo'=>'adunit-d0b3ce854b383055',
             'svideo'=>'adunit-966243949496c3f2'
            ];
        return $this->success($data);
      }
        if($num==5){
           $data = [
             'qid'=>'sBJspRr9717b2RMHzOAXCcBDxSH1vVDiZvGTeqOaBDw',
             'did'=>'iDtqotRlIl1YViPSLY95EoPGVwu4kckkMnXl4SKOtpE',
             'cvideo'=>'adunit-03636795e491b682',
             'jvideo'=>'adunit-66e098856b3c5aca',
             'svideo'=>'adunit-26102b939d278b84'
            ];
        return $this->success($data);
      }
    }


}
