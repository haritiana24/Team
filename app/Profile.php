<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getImage()
    {
        $pathImage = $this->image ?? 'avatars/default.jpg';
        return "/storage/" . $pathImage;
    }


}