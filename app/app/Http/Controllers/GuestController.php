<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;
use App\Like;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if(Auth::user()->role !== 2){
                abort(404);
            }
            return $next($request);
        });
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                        ->paginate(20); // ページネーション; 
        return view('guest.main', ['houses' => $houses,]);
    }

    public function search(Request $request)
    {
        $houses = House::houseSearch($request->all())
                         ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                         ->paginate(20); // ページネーション; 
        return view('guest.main', ['houses' => $houses,]);
     }

     public function favorite()
    {
        return view('guest.favorite');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house=House::findOrFail($id);
        $houseLikesCount = Like::with('house')->count();
        $bool = Like::like_exist(Auth::id(), $house->id);
        return view('guest.show', [
            'house' => $house,
            'likesCount' => $houseLikesCount,
            'bool' => $bool
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
