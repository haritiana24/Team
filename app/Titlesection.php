<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titlesection extends Model
{
    protected $guarded = [];

    public function header()
    {
        return $this->belognsTo('App\Header');
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
    public function sousections()
    {
        return $this->hasMany('App\Sousection');
    }
}