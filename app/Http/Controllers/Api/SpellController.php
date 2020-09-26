<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Spell;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    //

    public function store(Request $request)
    {

        $data=$request->all();
        $user = auth('api')->user();
        $data['user_id']=$user['id'];
//         dd($data);
        $res=  Spell::create($data);
        if($res){
            return $this->success('发起拼呗成功');
        }
    }
}
