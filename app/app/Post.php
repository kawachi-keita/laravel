<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->hasOne('App\User');
    }

    public function house()
    {   //housesテーブルとのリレーションを定義するhouseメソッド
        return $this->hasOne('App\House');
    }

    public static function post_exist($user_id, $house_id){
        return DB::table('posts')->where('user_id',$user_id)->where('house_id',$house_id)->exists();
    }
}
