<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Banner;
use App\Models\Lottery;
use App\Models\User;
use Illuminate\Http\Request;

class ElseController extends Controller
{
    //

    public function lottery()
    {
        $data= Lottery::all();
        return $this->success($data);
    }

    public function box(Request $request)
    {
        $rand=rand(10,30);
        if($request->has('pid')){
            $flight = User::find(request('pid'));
            $flight->diamondnum = ($flight['diamondnum']+=0) + $rand;
            $flight->save();
        };
        $user = auth('api')->user();
        $boxnum=User::find($user['id']);
        $boxnum->box=$boxnum['box']-1;
        $boxnum->save();
        if($boxnum['box']<=0){
            return $this->failed('不能再开了');
        }
//        dd($boxnum->toarray());

        return $this->success(['boxnum'=>$boxnum['box'],'rand'=>$rand]);
    }

    public function banner()
    {
        $banner=Banner::all();
        return $this->success($banner);
    }
}
