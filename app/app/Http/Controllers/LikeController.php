<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\Like;

class LikeController extends Controller
{
    public function ajaxlike(Request $request)
    {
        $user_id = Auth::id();
        $house_id = $request->house_id;
        $house = House::findOrFail($house_id);

        // 空でない（既にいいねしている）なら
        $bool = Like::like_exist($user_id, $house_id);
        if ($bool) {
            //likesテーブルのレコードを削除
            $like = Like::where('house_id', $house_id)->where('user_id', $user_id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->house_id = $request->house_id;
            $like->user_id = $user_id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $houseLikesCount = Like::with('house')->count();

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'houseLikesCount' => $houseLikesCount,
            'bool' => !$bool
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

}
