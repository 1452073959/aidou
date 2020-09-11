<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
	
    protected $table = 'ranking';
    public $timestamps = false;


    public function celebrity()
    {
       return  $this->belongsTo(Celebrity::class);
    }

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
