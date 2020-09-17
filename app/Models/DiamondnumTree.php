<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DiamondnumTree extends Model
{
	
    protected $table = 'diamondnum_tree';
    public $timestamps = false;
    protected $guarded = [];
    //用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //等级
    public function speed()
    {
        return $this->belongsTo(Speed::class);
    }
}
