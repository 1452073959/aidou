<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
// use App\Http\Controller;
use App\Models\FdzFb;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ranking;
use Illuminate\Support\Facades\DB;
use Redis;

class Dccontroller extends Controller
{
    //

    public function wechat(Request $request)
    {
        $data = $request->all();
        $app = \EasyWeChat::miniProgram();
        $wq = $app->auth->session($data['code']); // $code 为wx.login里的code
//        dd($wq);
        if (isset($wq['errcode'])) {
            return $this->failed('code已过期或不正确');
        }
        $weappOpenid = $wq['openid'];
        $weixinSessionKey = encrypt($wq['session_key']);
        $user = User::where('weapp_openid', $weappOpenid)->first();
        //没有，就注册一个用户
        if (!$user) {
            $user = new User();
            $user->weapp_openid = $weappOpenid;
            $user->nickname = $data['userInfo']['nickName'];
            $user->weapp_avatar = $data['userInfo']['avatarUrl'];
            $user->save();
        } else {
            $user->weapp_openid = $weappOpenid;
            $user->nickname = $data['userInfo']['nickName'];
            $user->weapp_avatar = $data['userInfo']['avatarUrl'];
            $user->save();
        }

        //        $token= auth('api')->login($user);
        $token = auth('api')->tokenById($user['id']);
        return $this->success($this->respondWithToken($token));
//        return $this->respondWithToken($token);
    }

    public function rank(Request $request)
    {
        $data = $request->all();
        $num = request('num', -1);
        $where = [];
        $y = date('Y', time());
        $m = date('m', time());
        $w = date('W', time());
        $y = request('y', $y);
        $m = request('m', $m);
        $w = request('w', $w);

        $where = ['y' => $y, 'm' => $m, 'w' => $w];

        $rank = Ranking::with('celebrity')->where($where)->get();
//                dd($rank);
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
        $data = Redis::zrevrange('zset1', 0, $num, 'withscores');//返回有序集合的所有值
//        var_dump($data);
//        return $data;
//     return json_encode($data);
//    echo  Redis::zadd('zset1',1,'ab11');
//    echo  Redis::zadd('zset1',2,'cd');
//    echo  Redis::zadd('zset1',3,'ef');
        return $this->success($data);
    }




    public static function getWeeks($date = '')
    {
        $date = date('Y-m-d', time());
        echo date('W', strtotime($date)) - 1;
    }


    /**
     * 获取本周所有日期列表
     * @param string $time
     * @param string $format
     * @return array
     */
    function get_week_day_list($time = '', $format = 'Y-m-d')
    {
        $time = $time != '' ? $time : time();
        //获取当前周几
        $week = date('w', $time);
        $date = [];
        for ($i = 1; $i <= 7; $i++) {
            $date[$i] = date($format, strtotime('+' . $i - $week . ' days', $time));
        }
        return $date;
    }

    /**
     * 获取某年第几周的开始日期和结束日期
     * @param int $year
     * @param int $week 第几周;
     */

    public function weekday($year, $week = 1)
    {

        $year_start = mktime(0, 0, 0, 1, 1, $year);

        $year_end = mktime(0, 0, 0, 12, 31, $year);

        // 判断第一天是否为第一周的开始 

        if (intval(date('W', $year_start)) === 1) {

            $start = $year_start; //把第一天做为第一周的开始 

        } else {

            $week++;

            $start = strtotime('+1 monday', $year_start); //把第一个周一作为开始 

        }
        $a = [];
        // 第几周的开始时间 

        if ($week === 1) {

            $weekday['start'] = $start;
        } else {

            $weekday['start'] = strtotime('+' . ($week - 0) . ' monday', $start);
        }
        $a['start'] = date('Y-m-s', $weekday['start']);
        // 第几周的结束时间 

        $weekday['end'] = strtotime('+1 sunday', $weekday['start']);

        if (date('Y', $weekday['end']) != $year) {

            //  $weekday['end'] = $year_end; 
            $weekday['end'] = date('Y-m-s h:i:s', $year_end);
        }
        $a['end'] = date('Y-m-s', $weekday['end']);

        return $weekday;
    }
}
