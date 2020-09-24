<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Qunman;
use App\Models\Qunmass;
use Illuminate\Http\Request;
use App\Models\Ranking;

class MassController extends Controller
{
    //发起集结
    public function mass(Request $request)
    {
        $user = auth('api')->user();
//            dd($user);
        if ($request->has('celebrity_id')) {
            $participation=  $user->qunmass()->where('celebrity_id',$request->input('celebrity_id'))->first();
            if($participation){
                return $this->success($participation);
            }else{
                $cart = new Qunmass();
                $cart->user()->associate($user);
                $cart->celbrity()->associate($request->input('celebrity_id'));
                $cart->end_time = time() + 3600;
                $cart->del_time = time() + (3600 * 3);
                $cart->save();
                return $this->success($cart);
            }

        } else {
            return $this->success('错误');
        }

    }

    //参与集结
    public function participation(Request $request)
    {
        $user = auth('api')->user();
        if ($request->has('qunmass_id')) {
            $participation = $user->participation()->where('qunmass_id', $request->input('qunmass_id'))->first();
            if ($participation) {
                return $this->success('该集结您已参与过');
            } else {
                $participation=Qunmass::find( $request->input('qunmass_id'));
                if($user['id']==$participation['user_id']){
                    return $this->success('发起人已经默认参与哟!');
                }
//                dump($participation);
                if($participation['end_time']<time()){
                    return $this->success('该集结已过期');
                }
                $user->participation()->create([
                    'qunmass_id' => $request->input('qunmass_id')
                ]);
                $initiator = Qunmass::withCount('participation')->where('id', $request->input('qunmass_id'))->first();

                if ($initiator['participation_count'] == 2) {
                    $y = date('Y', time());
                    $m = date('m', time());
                    $d = date('d', time());
                    $w = date('W', time());
                    $rank = new Ranking();
                    $rank->celebrity_id = $initiator['celebrity_id'];
                    $rank->user_id = $initiator['user_id'];
                    $rank->y = $y;
                    $rank->m = $m;
                    $rank->d = $d;
                    $rank->w = $w;
                    $rank->mingci = 30;
                    $rank->save();
                }
                if ($initiator['participation_count'] > 2) {
                    $y = date('Y', time());
                    $m = date('m', time());
                    $d = date('d', time());
                    $w = date('W', time());
                    $rank = new Ranking();
                    $rank->celebrity_id = $initiator['celebrity_id'];
                    $rank->user_id = $initiator['user_id'];
                    $rank->y = $y;
                    $rank->m = $m;
                    $rank->d = $d;
                    $rank->w = $w;
                    $rank->mingci = 10;
                    $rank->save();
                }
                return $this->success('参与成功');
            }
        }

    }

    //查询集结
    public function massquery(Request $request)
    {
        $qunmass_id = $request->input('qunmass_id');
        //发起人信息
        $initiator = Qunmass::with('user')->where('id', $qunmass_id)->get();
        //参与人
        $participant = Qunman::with('user')->where('qunmass_id', $qunmass_id)->get();

        return $this->success(['initiator' => $initiator, 'participant' => $participant]);
    }
}
