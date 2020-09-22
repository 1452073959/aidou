<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//jwt
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

//  钻石树
    public function tree()
    {
        return $this->hasOne(DiamondnumTree::class);
    }


    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::created (function ($model) {
            $model->tree()->create(['speed_id'=>1,'last_time'=>time(),'collect'=>0]);
//            dd($model);
        });

        // 监听模型创建事件，在写入数据库之前触发
        static::created(function ($model) {
            $task=Task::all();
            foreach ($task as $k=>$v)
            {
                if ($model->task()->find($v->id)) {
                    return [];
                }
                $model->task()->attach($v);
            }
        });
        static::updated(function($model) {
            $task=Task::all();
            foreach ($task as $k=>$v)
            {
                if ($model->task()->find($v->id)) {
                    return [];
                }
                $model->task()->attach($v);
            }
        });
    }

//  任务

    public function task()
    {
        return $this->belongsToMany(Task::class, 'users_task')->withPivot('status')->withTimestamps();

    }
    public function participation()
    {
        return $this->hasMany(Qunman::class);
    }

    public function qunmass()
    {
        return $this->hasMany(Qunmass::class);
    }







}
