<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
	
    protected $table = 'assistance';
    protected $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'xid','id');
    }
}
