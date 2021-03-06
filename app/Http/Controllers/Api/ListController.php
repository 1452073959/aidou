<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Celebrity;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Storage;
class ListController extends Controller
{
    //获取有哪些月份
    public function date()
    {
        $y = Ranking::groupBy('y')->orderby('y', 'desc')->pluck('y');
        $m = Ranking::groupBy('m')->orderby('m', 'desc')->pluck('m');
        $w = Ranking::groupBy('w')->orderby('w', 'desc')->pluck('w');

        return $this->success(['Y' => $y, 'm' => $m, 'w' => $w]);
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
        $y = request('y', $y);
        $w = request('w', $w);

        return $this->success($this->weekday($y, $w));
    }


    public function rank(Request $request)
    {
//        $data=$request->all();
        $num = request('num', -1);
        $where = [];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y = request('y', $y);
        $m = request('m', $m);
        $w = request('w', $w);
        if (!$request->has('y')) {
            $where = ['y' => $y, 'w' => (string)$w];
        }
        if ($request->has('y') && $request->has('m')) {
            $where = ['y' => $y, 'm' => $m];
        }
        if ($request->has('y') && $request->has('w')) {
            $where = ['y' => $y, 'w' => (string)$w];
        }

//        dump($where);
        $rank = Ranking::with('celebrity')->where($where)->get();

        $genre = $rank->groupBy('celebrity_id');
        Redis::flushall();
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

        $data = Redis::zrevrange('zset1', 0, $num, 'withscores');//返回有序集合的所有值
//            dd($data);
//        $data=json_encode($data);
//
//        var_dump($data);
//        return $data;
//     return json_encode($data);
//    echo  Redis::zadd('zset1',1,'ab11');
//    echo  Redis::zadd('zset1',2,'cd');
//    echo  Redis::zadd('zset1',3,'ef');

        $a = [];
        foreach ($data as $k => $v) {
            $a[$k]['star'] = json_decode($k, true);
            $a[$k]['num'] = $v;
        }
        $a = array_values($a);
//        dd($a);
        return $this->success($a);
    }

    //打榜
    public function rankadd(Request $request)
    {
        $data = $request->all();

        $user = auth('api')->user();
//        dd($user);

        if($user['votenum']<=0){
            return $this->success('票数不足');
        }
        $y = date('Y', time());
        $m = date('m', time());
        $d = date('d', time());
        $w = date('W', time());

        if ($request->has('celebrity_id') && $request->has('mingci')) {
            $rank = new Ranking();
            $rank->celebrity_id = $request->input('celebrity_id');
            $rank->user_id = $user['id'];
            $rank->y = $y;
            $rank->m = $m;
            $rank->d = $d;
            $rank->w = $w;
            if ($request->has('double')) {
                $rank->mingci = $request->input('mingci') * 2;
            } else {
                $rank->mingci = $request->input('mingci');
            }
            $rank->save();
            $user->votenum = $user['votenum'] - ($request->input('mingci'));
            $user->save();
            return $this->success($rank);
        } else {
            return $this->success('错误');
        }
    }

    public function and(Request $request)
    {
        if ($request->has('user')) {
            $user = User::find($request->input('user'));
        } else {
            $user = auth('api')->user();
        }

        $y = date('Y', time());
        $m = date('m', time());
        $d = date('d', time());
        $w = date('W', time());
        $m1 = Celebrity::all();
        foreach ($m1 as $k => $v) {
            $rank = new Ranking();
            $rank->celebrity_id = $v['id'];
            $rank->user_id = $user['id'];
            $rank->y = $y;
            $rank->m = $m;
            $rank->d = $d;
            $rank->w = $w;
            $rank->mingci = 1;
            $rank->save();
        }

    }


    //明星排名/影响力
    public function celeberrank(Request $request)
    {

        $num = request('num', -1);
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y = request('y', $y);
        $m = request('m', $m);
        $w = request('w', $w);
        $where = [];
        $where = ['y' => $y, 'm' => $m];
//        $where = ['y' => $y, 'w' => (string)$w];
        $rank = Ranking::with('celebrity')->where($where)->get();
        $genre = $rank->groupBy('celebrity_id');
        foreach ($genre as $k => $v) {
            $sum = 0;
            foreach ($v as $k1 => $v2) {
                $sum += (int)$v2['mingci'];
                Redis::zadd('zset2', $sum, $v2['celebrity']);
            }
        }

        $celebr = Celebrity::find($request->input('celebrity_id'));
        $order = Redis::zrevrank('zset2', $celebr);
        $b = Redis::zscore('zset2', $celebr);
        return $this->success(['user' => $celebr, 'order' => $order + 1, 'sum' => $b]);

    }

//  单个明星;
    public function fanlist(Request $request)
    {
        $num = request('num', -1);
        $where = [];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y = request('y', $y);
        $m = request('m', $m);
//        $w=request('w', $w);
        $where = ['y' => $y, 'm' => $m,];
        if ($request->has('celebrity_id')) {
            $rank = Ranking::with('user')->where($where)->where('celebrity_id', $request->input('celebrity_id'))->groupBy('user_id')->get();

            foreach ($rank as $k => $v) {
                $rank[$k]['num'] = array_sum(DB::table('ranking')->where($where)->where('user_id', $v['user_id'])->where('celebrity_id', $request->input('celebrity_id'))->pluck('mingci')->toArray());
            }
//            dd($rank->toarray());
            $rank = $rank->toarray();

            $newArr = array();
            for ($j = 0; $j < count($rank); $j++) {
                $newArr[] = $rank[$j]['num'];
            }
            array_multisort($newArr, SORT_DESC, $rank);
//            dd($rank);
            //当前页数 默认1
            $page = $request->page ?: 1;
            //每页的条数
            $perPage = 10;
            //计算每页分页的初始位置
            $offset = ($page * $perPage) - $perPage;
            //实例化LengthAwarePaginator类，并传入对应的参数
            $data = new LengthAwarePaginator(array_slice($rank, $offset, $perPage, false), count($rank), $perPage,
                $page, ['path' => $request->url(), 'query' => $request->query()]);
            return $this->success($data);

        } else {

            if (Cache::has('cacheKey')) {
                $col = json_decode(Cache::get('cacheKey'));
            } else {
                $cel = Celebrity::all();
                $col = [];
                foreach ($cel as $key => $val) {
                    $rank = Ranking::with('user', 'celebrity')->where($where)->where('celebrity_id', $val['id'])->groupBy('user_id')->get();
                    foreach ($rank as $k => $v) {
                        $rank[$k]['num'] = array_sum(DB::table('ranking')->where($where)->where('user_id', $v['user_id'])->where('celebrity_id', $val['id'])->pluck('mingci')->toArray());
                    }
                    $rank = $rank->toarray();
                    $newArr = array();
                    for ($j = 0; $j < count($rank); $j++) {
                        $newArr[] = $rank[$j]['num'];
                    }
                    array_multisort($newArr, SORT_DESC, $rank);
                    $col[] = $rank['0'];
                }
                $fir = array();
                for ($j = 0; $j < count($col); $j++) {
                    $fir[] = $col[$j]['num'];
                }
                array_multisort($fir, SORT_DESC, $col);
                $col = json_encode($col);
                Cache::put('cacheKey', $col, 1800);
                $col = json_decode(Cache::get('cacheKey'));

            }
            return $this->success($col);
        }
    }

    //本人投过的
    public function merank()
    {
        $where = [];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y = request('y', $y);
        $m = request('m', $m);
        $w = request('w', $w);
        $user = auth('api')->user();

        $where = ['y' => $y,'w' => (string)$w , 'user_id' => $user['id']];
        $rank = Ranking::with('celebrity')->where($where)->orderBy('id', 'desc')->get();

        $genre = $rank->groupBy('celebrity_id');

        foreach ($genre as $k => $v) {
            $sum = 0;
            foreach ($v as $k1 => $v2) {
                $sum += (int)$v2['mingci'];
                Redis::zadd($user['id'], $sum, $v2['celebrity']);
            }
        }
        $data = Redis::zrevrange($user['id'], 0, 1, 'withscores');//返回有序集合的所有值

        $a = [];
        foreach ($data as $k => $v) {
            $a[$k]['star'] = json_decode($k, true);
            $a[$k]['num'] = $v;
        }
        $a = array_values($a);
        return $this->success($a);
    }


    public function lastfans(Request $request)
    {

        if ($request->has('celebrity_id')) {
            $rank = Ranking::with('user')->where('celebrity_id', $request->input('celebrity_id'))->orderBy('id', 'desc')->take(5)->get();
        } else {
            return $this->success('明星id未传');
        }
        return $this->success($rank);
    }

    //明星搜索
    public function search(Request $request)
    {
        $builder = Celebrity::query();
        // 判断是否有提交 search 参数，如果有就赋值给 $search 变量
        if ($search = $request->input('search', '')) {
            $like = '%' . $search . '%';
            $builder->where(function ($query) use ($like) {
                $query->where('name', 'like', $like);
            });
        }

        $celebrity = $builder->get();
        foreach ($celebrity as $k => $v) {
            $celebrity[$k]['influencenum'] = Redis::zscore('zset1', $v);
        }

        return $this->success($celebrity);
    }


    //投票
    public function restrank(Request $request)
    {
        $y = date('Y', time());
        $m = date('m', time());
        $d = date('d', time());
        $w = date('W', time());
        $user['id'] = $request->input('user_id');
        if ($request->has('celebrity_id') && $request->has('mingci')) {
            $rank = new Ranking();
            $rank->celebrity_id = $request->input('celebrity_id');
            $rank->user_id = $user['id'];
            $rank->y = $y;
            $rank->m = $m;
            $rank->d = $d;
            $rank->w = $w;
            $rank->mingci = $request->input('mingci');
            $rank->save();
            return $this->success('添加成功');
        } else {
            return $this->success('明星id和票数不齐');
        }
    }
    ///
    //
    public function collnum(Request $request)
    {
        if ($request->has('celebrity_id')) {
            $user = auth('api')->user();
            if($user['true']==1){
                $user['true']=2;
                $user->save();
                $collnum = Celebrity::find($request->input('celebrity_id'));
                $collnum->influencenum=$collnum['influencenum']+1;
                $collnum->save();
                return $this->success($collnum);
            }else{
                return $this->success('已入驻过');
            }

        } else {
            return $this->success('明星id未传');
        }
    }



}
