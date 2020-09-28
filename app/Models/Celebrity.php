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

            Redis::flushall();
            $y = date('Y', time());
            $m = date('m', time());
            $d = date('d', time());
            $w = date('W', time());
            $model->rank()->create([
            'user_id'=>15,
           'celebrity_id'=>$model['celebrity_id'],
                'y'=>$y,
                'm'=>$m,
                'd'=>$d,
                'w'=>$w,
                'mingci'=>1,
            ]);


//            dd($model->toarray());
        });

        static::updated(function($model) {

            Redis::flushall();
        });
    }

    public function rank()
    {
        return $this->hasMany(Ranking::class);
    }
}
