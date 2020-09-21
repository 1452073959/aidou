<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            if($request->input('type')==1){
                $flight->diamondnum = ($flight['diamondnum']+=0) + $num;
            }
            //票
            //积分
            if($request->input('type')==2){
                $flight->votenum = ($flight['votenum']+=0) + $num;
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
}
