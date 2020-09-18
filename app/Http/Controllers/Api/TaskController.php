<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    //

    public function list(Request $request)
    {
        $user = auth('api')->user();
        if ($request->has('type')) {
            $task= $user->task()->where('type',request('type'))->get();
        }else{
            return $this->success('传入任务参数类型!');
        }
        return $this->success($task);
    }
    //领取积分
    public function gain(Request $request)
    {
        $user = auth('api')->user();
        $data = $request->all();
        if (!$request->has('task_id')) {
            return $this->success('错误');
        }else{
            $gain= $user->task()->find($data['task_id']);
            $res=DB::table('users')->where('id',$user['id'])->update(['diamondnum'=>$user['diamondnum']+$gain['num']]);
            $user->task()->updateExistingPivot($data['task_id'],['status'=>3]);
            if($res){
                return $this->success('领取成功');
            }else{
                return $this->success('失败');
            };
        }
    }
//完成任务;
    public function perform(Request $request)
    {
        $user = auth('api')->user();

        $data = $request->all();
        if ($request->has('task_id')&&$request->has('status')) {
            $gain= $user->task()->find($data['task_id']);
            $user->task()->updateExistingPivot($data['task_id'],['status'=>$data['status']]);
            if($user){
                return $this->success('完成成功');
            }else{
                return $this->success('失败');
            };
        }else{
            return $this->success('错误');
        }
    }
}
