<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // {  
         
    //     // $house = House::orderBy('created_at', 'desc')->get();
    //     // return view('house.main')->with(['house' => $house]);
    // }
    {
        return view('house.mypage');
    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('house.entry');
    }

    public function getConf(Request $request)
    {
        $validatedData = $request->validate([
            'image1' => 'required|max:1024|mimes:jpg,jpeg,png,gif',
            'image2' => 'required|max:1024|mimes:jpg,jpeg,png,gif',
            'image3' => 'required|max:1024|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'adress' => 'required',
            'amount' => 'required',
            'size' => 'required',
            'layout' => 'required',
            'information' => 'required',
            'comment' => 'required',

        ]);

        // ディレクトリ名
        $dir = 'images';
        $columns = ['image1','image2','image3'];
        foreach($columns as $column) {
            // アップロードされたファイル名を取得
            $file_name = $request->file($column)->getClientOriginalName();

            // 取得したファイル名で保存
            $request->file($column)->storeAs('public/' . $dir, $file_name);
            $request->$column=$file_name;
        }
        return view('house.conf',['input'=>$request]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $house = new House;
        $columns = [ 'name', 'adress', 'amount', 'size', 'layout', 'information','comment', 'image1','image2','image3',];
        foreach($columns as $column) {
            $house->$column = $request->$column;
        }
        Auth::user()->house()->save($house);

        return redirect('/house/mypage')->with('flash_message', '投稿が完了しました');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id); //idが、リクエストされた$userのidと一致するuserを取得
        $houses = House::where('user_id', $user->id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(10); // ページネーション; 
        return view('house.main', [
            'name' => $name->name, // $user名をviewへ渡す
            'houses' => $houses, // $userの書いた記事をviewへ渡す
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
