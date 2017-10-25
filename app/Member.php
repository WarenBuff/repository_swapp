<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    protected $fillable = ['name','slug','href'];

    public function characters()
    {
        return $this->belongsToMany('App\Character')
            ->withPivot('gear', 'star', 'level')
            ->withTimestamps();
    }
}
