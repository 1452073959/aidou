<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Assistance;
use App\Models\Project;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    //
    //发起应援
    public function assistance(Request $request)
    {
        $data=$request->all();
        $user = auth('api')->user();
        $data['user_id']=$user['id'];
       $res=  Assistance::create($data);

       if($res){
           return $this->success('发起应援成功');
       }

    }
    //应援列表
    public function assistancelist()
    {
        $data=Assistance::where('status',2)->get();
        return $this->success($data);
    }
    //应援详情
    public function assistanceshow(Request $request)
    {
        if ($request->has('id')) {
            $data=Assistance::find($request->input('id'));
            return $this->success($data);
        }else{
            return $this->success('错误');
        }
    }
//    参与应援

    public function assistanceparticipation(Request $request)
    {
        if ($request->has('id')) {
            $data=Assistance::find($request->input('id'));
            $data->stocksnum=$data['stocksnum']+1;
            $data->save();
            return $this->success($data);
        }else{
            return $this->success('错误');
        }
    }
}

