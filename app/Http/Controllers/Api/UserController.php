<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    //获取用户信息
    public function usershow(Request $request)
    {
//        dd($this->user);
        $user = auth('api')->user();
        return $this->success($user);
    }
    //修改用户信息
    public function updateuser(Request $request)
    {

        $user = auth('api')->user();
        $flight = User::find($user['id']);
        $num=request('num',0);
        if($request->has('type')){
            //票
            if($request->input('type')==1){
                $flight->diamondnum = ($flight['diamondnum']+=0) + $num;
            }
            //积分
            if($request->input('type')==2){
                $flight->votenum = ($flight['votenum']+=0) + $num;
            }
            //抽奖
            if($request->input('type')==3){
                $flight->drawamount = ($flight['drawamount']+=0) + $num;
            }
            //箱子
            if($request->input('type')==4){
                $flight->box = ($flight['box']+=0) + $num;
            }
            if($request->input('type')==5){
                $flight->boxtwo = ($flight['box']+=0) -1;
            }
            $flight->save();
            return $this->success('领取成功');
        }else{
           return $this->success('错误');
        }
    }

    //用户钻石兑换票
    public function conversion(Request $request)
    {
        $user = auth('api')->user();
        $flight = User::find($user['id']);
        $num=request('votenum',0);
        if($request->has('votenum')) {

            if($flight['diamondnum']<($num*10)){
                return $this->success('钻石不足以兑换');
            }else{
                //            票增加
                $flight->votenum = ($flight['votenum']+=0) + $num;
                //钻石减少
                $flight->diamondnum = $flight['diamondnum'] - ($num*10);
                $flight->save();
//                dd($flight);
                return $this->success($flight);
            }

        }else{
            return $this->success('需填写兑换票数');
        }
    }

    public function sign()
    {
        $now = time();
        $user = auth('api')->user();
        $last_time=$user['sign_time'];
        $y = date('Y',$last_time);
        $m = date('m',$last_time);
        $d = date('d',$last_time);
        $allowTime= mktime(0,0,0,$m,$d,$y);
        $allowTime += 3600*24;
        // 过了允许签到的时间就给签到
        if($allowTime <= $now) {
            $user->sign_time = time();
            $user->sign_num = $user['sign_num']+1;
            $user->save();

            if($user['sign_num']<7){
                $num=100*$user['sign_num'];
                $user->votenum=$user['diamondnum']+(100*$user['sign_num']);
                $user->save();
                return $this->success(['msg'=>'签到成功,获得钻石`','num'=>$num,'type'=>1]);
            }else{
                $user->votenum=$user['votenum']+100;
                $user->save();
                return $this->success(['msg'=>'签到成功,获得票`','num'=>100,'type'=>2]);
            }
        }else{
            return $this->success('今天已经签过到了');
        }

    }

    //订阅消息
    public function subscription()
    {
        $app = \EasyWeChat::miniProgram();

        $data = Redis::zrevrange('zset1', 0, 2);//返回有序集合的所有值
        $name=array();
        foreach ($data as $k => $v) {
            $name[] = json_decode($v, true);
        }
        $star=[];
        foreach ($name as $k=>$v )
        {
            $star[]=$v['name'];

        }
        $star=   implode(",", $star);

       $moban= $app->subscribe_message->getTemplates();
        $alluser=User::all();
       foreach ($alluser as $k=>$v){
           $data = [
               'template_id' => 'RdSQCKuMqgJJaVbL_h6uEnpfWp89sP4gq9cgCiskr-A', // 所需下发的订阅模板id
               'touser' => $v['weapp_openid'],     // 接收者（用户）的 openid
               'page' => 'pages/index/index',      // 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
               'data' => [
                   'thing1' => [
                       'value'=>'每日签到开始啦!'
                   ],
                   'thing2' => [
                       'value'=>$star.'位居前三'
                   ],
               ],
           ];

           $app->subscribe_message->send($data);
       }


    }


    public function subscription2()
    {
        $app = \EasyWeChat::miniProgram();
        $moban= $app->subscribe_message->getTemplates();


        $alluser=User::all();
        foreach ($alluser as $k=>$v){
//            dump($alluser->toArray());
            if(Redis::exists($v['id'])){
                $data = Redis::zrevrange($v['id'], 0,0, 'withscores');
            }else{
                $data = Redis::zrevrange('zset1', 0, 0,'withscores');
            }
            $a = [];
            foreach ($data as $k => $v) {
                $a[$k]['star'] = json_decode($k, true);
                $a[$k]['star'] =   $a[$k]['star']['name'];
                $a[$k]['num'] = $v;
            }
            $a = array_values($a);
            $star= implode("当前", $a['0']);
        $data = [
            'template_id' => 'eF7rzChPMPR1lN6Pqv6Ql7sbZ9fRrtVZMYtcbh6Vkg8', // 所需下发的订阅模板id
            'touser' =>$v['weapp_openid'],     // 接收者（用户）的 openid
            'page' => 'pages/index/index',      // 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
            'data' => [
                'thing1' => [
                    'value'=>'爱豆等你很久了~!'
                ],
                'date4' => [
                    'value'=>date('y-m-d h:i:s',time())
                ],
                'thing6' => [
                    'value'=>$star
                ],
            ],
        ];

        $app->subscribe_message->send($data);
        }
    }
}
