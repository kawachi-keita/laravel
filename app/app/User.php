<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword; 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'profile', 'role', 'email', 'password',
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

     /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function houses() {
        return $this->hasMany('App\House'); //一対多
    }
    public function likeHouses() {
        return $this->belongsToMany('App\House','likes','user_id','house_id'); //多対多
    }
    public function likes() {
        return $this->hasMany('App\Like');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function scopeUserSearch($query, $data) //検索機能
    {
        if(!is_null($data['name'])){
            $query->orWhere('name','like','%'.$data['name'].'%');
        }
        if(!is_null($data['email'])){
            $query->orWhere('email','like','%'.$data['email'].'%');
        }
        if(!is_null($data['profile'])){
            $query->orWhere('profile','like','%'.$data['profile'].'%');
        }
        return $query;

    }

    

}
