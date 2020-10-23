<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $guarded = [];

    public function user()
    {
       return  $this->belongsTo("App\User");
    }

    public function titleSection()
    {
        return $this->hasOne('App\Titlesection');
    }

}