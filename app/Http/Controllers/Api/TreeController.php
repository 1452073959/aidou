<?php

namespace App\Http\Controllers\Api;

use App\Models\DiamondnumTree;
use App\Models\Speed;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
class TreeController extends Controller
{
    //
    public function collect()
    {
        $user = auth('api')->user();
        //现在时间
        $time=time();
        //上次`收取时间
        $last_time=$user->tree->last_time;
        //算出等级速度
        $gradenum=$user->tree()->with('speed')->first();
//        dd($gradenum->toarray());
        //计算出可收取钻石
//        dump($time);
//        dump($last_time);
//        dump($gradenum['speed']['num']);
        $num=ceil((($time-$last_time)*$gradenum['speed']['num'])/10);

//        计算出该等级最大钻石存储量
       $max= (28800*$gradenum['speed']['num'])/10;
        if($num>$max){
            $num=$max;
            $over=false;
        }else{
            $over=true;
        }
        $user->tree()->update(['collect'=>$num]);
        //可收取钻石//钻石速度//升级所需//用户钻石余额//总收取//用户等级
        return $this->success([
            'num'=>$num,
            'gradenum'=>$gradenum['speed']['num'],
            'upgrade'=>$gradenum['speed']['upgrade'],
            'diamondnum'=>$user['diamondnum'],
            'total'=>$gradenum['total'],
            'speed'=>$user['tree']['speed_id'],
            'over'=>$over,
        ]);
    }
    //收取钻石
    public function take()
    {
        $user = auth('api')->user();
//        dd($user->toarray());
        $gradenum=$user->tree()->with('speed')->first();
//        dd($gradenum->toarray());
        DB::transaction(function ()  use ($user,$gradenum) {
            $user->tree()->update(['collect'=>0,'total'=>$gradenum['total']+$gradenum['collect'],'last_time'=>time()]);
            $user->diamondnum=$user['diamondnum']+$gradenum['collect'];
            $user->save();
        });
        $gradenum=$user->tree()->with('speed')->first();
        return $this->success([
            'num'=>0,
            'gradenum'=>$gradenum['speed']['num'],
            'upgrade'=>$gradenum['speed']['upgrade'],
            'diamondnum'=>$user['diamondnum'],
            'total'=>$gradenum['total'],
            'speed'=>$user['tree']['speed_id'],
            'over'=>true,
        ]);
    }
    //升级
    public function upgrade()
    {
        $user = auth('api')->user();
        //最高等级
        $max= Speed::max('grade');
        if($user->tree->speed_id==$max){
            return $this->success('已升到最高等级');
        }
        //下一级
        $next=Speed::where('grade',$user->tree->speed_id+1)->first();
        $gradenum=$user->tree()->with('speed')->first();
        if($user['diamondnum']<$gradenum['speed']['upgrade']){
            return $this->success('升级失败!钻石余额不足');
        }
        $user->tree()->update(['speed_id'=>$next['grade']]);
        $user->diamondnum=$user['diamondnum']-$gradenum['speed']['upgrade'];
        $user->save();
        $gradenum=$user->tree()->with('speed')->first();

        return $this->success([
            'num'=>$gradenum['collect'],
            'gradenum'=>$gradenum['speed']['num'],
            'upgrade'=>$gradenum['speed']['upgrade'],
            'diamondnum'=>$user['diamondnum'],
            'total'=>$gradenum['total'],
            'speed'=>$user['tree']['speed_id'],
        ]);
    }
}
