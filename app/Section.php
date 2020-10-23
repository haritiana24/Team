<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected  $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function title()
    {
        return $this->belongsTo('App\Titlesection');
    }

    public function scopeSections($req , $id)
    {
        return $req->where('titlesection_id', $id );
    }

    public function scopeEnligne($req)
    {
        return $req->where('status', 1)->get();
    }

    public function scopeHome($req)
    {
        // 
    }


}