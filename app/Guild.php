<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Guild extends Model
{
    public function members()
    {
        return $this->hasMany('App\Member');
    }
    public function characters()
    {
        return $this->hasManyThrough('App\Character', 'App\Member');
    }
}
