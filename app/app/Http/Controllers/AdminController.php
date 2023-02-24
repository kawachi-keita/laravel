<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function index()
    {
        return view('admin.main');
    }

    public function searchHouse()
    {
        $houses = House::orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
        ->paginate(20); // ページネーション; 
        return view('admin.searchhouse', ['houses' => $houses,]);
    }

    public function adminSearchHouse(Request $request)
    {
        $houses = House::houseSearch($request->all())
                         ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                         ->paginate(20); // ページネーション; 
        return view('admin.searchhouse', ['houses' => $houses,]);
     }


    public function searchUser()
    {
        $users = User::paginate(20); // ページネーション; 
        return view('admin.searchuser', ['users' => $users,]);
    }

    public function adminSearchUser(Request $request)
    {
        $users = User::userSearch($request->all())
                         ->where('role', '!=', '0')
                         ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                         ->paginate(20); // ページネーション; 
        return view('admin.searchuser', ['users' => $users,]);
     }

     public function getUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.showUser', ['user' => $user,]);
    }

     public function getHouse($id)
    {
        $house = House::findOrFail($id);
        $users = User::join('posts','users.id','=','posts.user_id')
        ->where('posts.house_id',$house->id)
        ->select(
            'users.id as id',
            'users.neme',
            'users.email',
            'users.profile'
        );
        return view('admin.showHouse', [
            'house' => $house,
            'users' => $users,
    ]);
    }
}
