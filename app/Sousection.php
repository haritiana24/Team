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

   public function scopeSousectionAcrticle($query){
        return $query->where("titlesection_id", 2)->get();
    }
}