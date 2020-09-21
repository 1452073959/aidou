<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Qunman extends Model
{
	
    protected $table = 'qunman';
    public $timestamps = false;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
