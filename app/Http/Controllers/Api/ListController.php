<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Celebrity;
use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class ListController extends Controller
{
    //获取有哪些月份
    public function date()
    {


        $y=Ranking::groupBy('y')->orderby('y','desc')->pluck('y');
        $m=Ranking::groupBy('m')->orderby('m','desc')->pluck('m');
        $w=Ranking::groupBy('w')->orderby('w','desc')->pluck('w');

        return $this->success(['Y'=>$y,'m'=>$m,'w'=>$w]);
    }

    /**
     * 获取某年第几周的开始日期和结束日期
     * @param int $year
     * @param int $week 第几周;
     */

    public function w()
    {
        $y = date('Y', time());
        $w = date('W', time());
        $y=request('y', $y);
        $w=request('w', $w);

      return $this->success( $this->weekday($y,$w));
    }


    public function rank(Request $request)
    {
//        $data=$request->all();
        $num=request('num', -1);
        $where=[];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y=request('y', $y);
        $m=request('m', $m);
        $w=request('w', $w);

        $where = ['y'=>$y,'m'=>$m,'w'=>(string)$w];
//        dump($where);

        $rank = Ranking::with('celebrity')->where($where)->get();
//                dd($rank->toArray());
        $genre = $rank->groupBy('celebrity_id');
        foreach ($genre as $k => $v) {
            $sum = 0;
            foreach ($v as $k1 => $v2) {
                $sum += (int)$v2['mingci'];
                Redis::zadd('zset1', $sum, $v2['celebrity']);
            }
        }
//        //正序
//       dump(Redis::zrange("zset1",0,-1,'withscores'));
//        //倒序
//      dump(Redis::zrevrange("zset1",0,-1));
//      dump(Redis::scan("zset1",0,-1));
        $data = Redis::zrevrange('zset1',0,$num,'withscores');//返回有序集合的所有值
//            dd($data);
//        $data=json_encode($data);
//
//        var_dump($data);
//        return $data;
//     return json_encode($data);
//    echo  Redis::zadd('zset1',1,'ab11');
//    echo  Redis::zadd('zset1',2,'cd');
//    echo  Redis::zadd('zset1',3,'ef');
        return $this->success($data);
    }

    //打榜
    public function rankadd(Request $request)
    {
        $data=$request->all();

        $user = auth('api')->user();
//        dd($user);
        $y = date('Y', time());
        $m = date('m', time());
        $d = date('d', time());
        $w = date('W', time());
        if($request->has('celebrity_id')&&$request->has('mingci')){
            $rank=new Ranking();
            $rank->celebrity_id=$request->input('celebrity_id');
            $rank->user_id=$user['id'];
            $rank->y=$y;
            $rank->m=$m;
            $rank->d=$d;
            $rank->w=$w;
            $rank->mingci=$request->input('mingci');
            $rank->save();
            return $this->success($rank);
        }else{
            return $this->success('错误');
        }



    }
    //明星排名/影响力
    public function celeberrank(Request $request)
    {
        $celebr=Celebrity::find($request->input('celebrity_id'));
       $order= Redis::zrank ('zset1',$celebr);
       $b= Redis::zscore ('zset1',$celebr);
       return $this->success(['user'=>$celebr,'order'=>$order,'sum'=>$b]);

    }
//  单个明星;
    public function fanlist(Request $request)
    {
        $num=request('num', -1);
        $where=[];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y=request('y', $y);
        $m=request('m', $m);
        $w=request('w', $w);

        $where = ['y'=>$y,'m'=>$m,'w'=>(string)$w];


        if($request->has('celebrity_id')){
            $rank = Ranking::with('user')->where($where)->where('celebrity_id',$request->input('celebrity_id'))->get();
        }else{
            $rank = Ranking::with('user')->where($where)->get();

        }

        $fanlist = $rank->groupBy('user_id');

        foreach ($fanlist as $k => $v) {
//            dump($k);
            $sum = 0;
            foreach ($v as $k1 => $v2) {
                $sum += (int)$v2['mingci'];
                $fanlist[$k]['sum']=$sum;
            }
        }
        return $this->success($fanlist);
    }
    //本人投过的
    public function merank()
    {
        $where=[];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y=request('y', $y);
        $m=request('m', $m);
        $w=request('w', $w);
        $user = auth('api')->user();

        $where = ['y'=>$y,'m'=>$m,'w'=>(string)$w,'user_id'=>$user['id']];
        $rank = Ranking::with('celebrity')->where($where)->get();
        $genre = $rank->groupBy('celebrity_id');
        foreach ($genre as $k => $v) {
            $sum = 0;
            foreach ($v as $k1 => $v2) {
                $sum += (int)$v2['mingci'];
                Redis::zadd($user['id'], $sum, $v2['celebrity']);
            }
        }
        $data = Redis::zrevrange('zset1',0,1,'withscores');//返回有序集合的所有值
        return $this->success($data);
    }



}
