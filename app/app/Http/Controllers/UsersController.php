<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => 'mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'email' => 'required',
            'profile' => 'required',
        ]);

        //画像があれば処理を行う
        if($request->hasFile('image') && $user->image !== $request->image){
           // アップロードされたファイル名を取得
           $file_name = $request->file('image')->getClientOriginalName();

           // 取得したファイル名で保存
           $request->file('image')->storeAs('public/icon/', $file_name);
           $user->image=$file_name;
        }
    

        $columns = [ 'name', 'email', 'profile'];
        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        $user->save();
        return redirect()->route('house.mypage')->with('flash_message', 'ユーザー情報の編集が完了しました');


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
