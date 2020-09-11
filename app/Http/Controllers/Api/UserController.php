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
        $n=$request->all();
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
           return $this->failed('错误');
        }


    }
}
