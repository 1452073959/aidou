<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	
    protected $table = 'task';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_task')->withPivot('status')
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::created (function ($model) {
            $user=User::all();
            foreach ($user as $k=>$v)
            {
                if ($model->user()->find($v->id)) {
                    return [];
                }
                $model->user()->attach($v);
            }

        });
    }
}
