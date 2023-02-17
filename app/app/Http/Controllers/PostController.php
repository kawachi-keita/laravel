<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;
use App\Post;

class PostController extends Controller
{
    public function create($houseId)
    {
        $house = House::find($houseId); // 投稿作成日が新しい順に並べる
        return view('post.create', ['house' => $house,]);
    }

    public function conf(Request $request)
    {
        $validatedData = $request->validate([
            'date_at' => 'required',
            'time' => 'required',
            'question' => 'required',
        ]);
        
        return view('post.conf',['input'=>$request]);
    }

    public function complete(Request $request) {

        $post = new Post;
        $columns = ['house_id','date_at', 'time', 'question'];
        foreach($columns as $column) {
            $post->$column = $request->$column;
        }
        Auth::user()->posts()->save($post);

        return view('post.complete');

    }
}
