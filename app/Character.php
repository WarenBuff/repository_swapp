<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name','id','slug'];

    public function members()
    {
        return $this->belongsToMany('App\Member')
            ->withPivot('gear', 'star', 'level')
            ->withTimestamps();
    }
}
