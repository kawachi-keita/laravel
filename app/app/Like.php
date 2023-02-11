<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Like extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\User');
    }

    public function house()
    {   //housesテーブルとのリレーションを定義するhouseメソッド
        return $this->belongsTo('App\House');
    }

    public static function like_exist($user_id, $house_id){
        return DB::table('likes')->where('user_id',$user_id)->where('house_id',$house_id)->exists();
    }
}
