<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**  public static function boot()
    {
        parent::boot();
        static::created(function($user){
            $user->profile()->create([
                'title' => 'Profile de ' . $user->username
            ]);
        });
    }
      * */

    public function getRouteKeyName()
    {
        return  'username';
    }

    public function headers()
    {
        return $this->hasMany("App\Header");
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function footers()
    {
        return $this->hasMany('App\Footer');
    }

    public function logo()
    {
        return $this->hasOne('App\Logo');
    }

    public function sousections()
    {
        return $this->hasMany('App\Sousection');
    }

    public function scopeSections($req)
    {
        return $req->sections()->where('status', 1);
    }

}