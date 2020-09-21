<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Qunmass extends Model
{
	
    protected $table = 'qunmass';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function celbrity()
    {
        return $this->belongsTo(Celebrity::class,'celebrity_id','id');
    }
    public function participation()
    {
        return $this->hasMany(Qunman::class);
    }
}
