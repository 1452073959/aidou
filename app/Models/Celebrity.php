<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
class Celebrity extends Model
{
	
    protected $table = 'celebrity';
    protected $guarded = [];


    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::created(function ($model) {
            $y = date('Y', time());
            $m = date('m', time());
            $d = date('d', time());
            $w = date('W', time());
            $rank = new Ranking();
            $rank->celebrity_id = $model['celebrity_id'];
            $rank->user_id = 15;
            $rank->y = $y;
            $rank->m = $m;
            $rank->d = $d;
            $rank->w = $w;
            $rank->mingci =1;
            $rank->save();

            Redis::flushall();
        });

        static::updated(function() {
            Redis::flushall();
        });
    }
}
