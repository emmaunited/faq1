<?php


namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class User extends Authenticatable


{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}