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
        if ($request->has('task_id')) {
            $gainall= $user->task()->get();
            $gain= $user->task()->find($data['task_id']);
//            dd($gainall->toarray());

            foreach ($gainall as $k=>$v)
            {
                if($v['id']==15){
                    continue;
                }
                if($v['pivot']['status']==1){
                    break;
                }
                if($v['pivot']['status']==2){
                    $user->task()->updateExistingPivot(15, ['status' => 2]);
                }
            }
            $user->task()->updateExistingPivot($data['task_id'],['sum'=>$gain['pivot']['sum']+1]);
            if($gain['pivot']['sum']+1>=$gain['linit']) {
                $user->task()->updateExistingPivot($data['task_id'], ['status' => 2]);
            }
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
