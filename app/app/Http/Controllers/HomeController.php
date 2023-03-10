<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role ==1){
            return redirect()->action('HouseController@index');
        }
        elseif(Auth::user()->role ==2){
            return redirect()->action('GuestController@index');
        }
        else{
            return redirect()->action('AdminController@index');
        }

    }
    public function getMypage()
    {
        
        if(Auth::user()->role ==1){
            $houses = House::where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                            ->paginate(10); // ページネーション; 
            return view('house.mypage', [
                'houses' => $houses,
                //'users' => $user,
            ]);
        }
        elseif(Auth::user()->role ==2){
            $houses=Auth::user()->likeHouses()
                ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                ->paginate(10); // ページネーション;
                $posts=Post::leftJoin('houses','posts.house_id','=','houses.id')
                ->where('posts.user_id',Auth::id())
                ->get();
            return view('guest.mypage', [
                'houses' => $houses,
                // 'users' => $user,
                'posts' => $posts,
            ]);
        }
    }
    public function getFavorite()
    {
        
        if(Auth::user()->role ==1){
            $houses=Auth::user()->likeHouses()
                ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                ->paginate(10); // ページネーション;
                $posts=Post::leftJoin('houses','posts.house_id','=','houses.id')
                ->where('posts.user_id',Auth::id())
                ->get();
            return view('house.favorite', [
                'houses' => $houses,
                'posts' => $posts,
            
            ]);
        }
        elseif(Auth::user()->role ==2){
            $houses=Auth::user()->likeHouses()
                ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                ->paginate(10); // ページネーション;
                $posts=Post::leftJoin('houses','posts.house_id','=','houses.id')
                ->where('posts.user_id',Auth::id())
                ->get();
            return view('guest.favorite', [
                'houses' => $houses,
                'posts' => $posts,
            
            ]);
        }
    }

    
}
