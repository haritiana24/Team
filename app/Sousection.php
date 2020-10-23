<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sousection extends Model
{
    protected  $guarded = [];

    
    public function titlesection()
    {
        return $this->belongsTo('App\TitleSection');
    }
        
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}