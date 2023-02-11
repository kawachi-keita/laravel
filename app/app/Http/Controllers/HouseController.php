<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\House;
use App\User;
use App\Like;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if(Auth::user()->role !== 1){
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
       
        // $houses = House::where('user_id', $user->id) //$userによる投稿を取得
        $houses = House::orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                        ->paginate(20); // ページネーション; 
        return view('house.main', ['houses' => $houses,]);
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
            'image1' => 'required|mimes:jpg,jpeg,png,gif',
            'image2' => 'required|mimes:jpg,jpeg,png,gif',
            'image3' => 'required|mimes:jpg,jpeg,png,gif',
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
        Auth::user()->houses()->save($house);

        return redirect('/house/mypage')->with('flash_message', '投稿が完了しました');
        
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
        return view('house.show', [
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
        $house=House::findOrFail($id);
        return view('house.edit', ['house' => $house,]);
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
        $validatedData = $request->validate([
            'image1' => 'mimes:jpg,jpeg,png,gif',
            'image2' => 'mimes:jpg,jpeg,png,gif',
            'image3' => 'mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'adress' => 'required',
            'amount' => 'required',
            'size' => 'required',
            'layout' => 'required',
            'information' => 'required',
            'comment' => 'required',

        ]);
        
        $house=House::findOrFail($id);

        //画像があれば処理を行う
        if($request->hasFile('image1') && $house->image1 !== $request->image1){
            $file_name= $this->putImageToStorage($request->image1);
            $house->image1=$file_name;
        }
        if($request->hasFile('image2') && $house->image2 !== $request->image2){
            $file_name= $this->putImageToStorage($request->image2);
            $house->image2=$file_name;
        }
        if($request->hasFile('image3') && $house->image3 !== $request->image3){
            $file_name= $this->putImageToStorage($request->image3);
            $house->image3=$file_name;
        }
    

        $columns = [ 'name', 'adress', 'amount', 'size', 'layout', 'information','comment'];
        foreach($columns as $column) {
            $house->$column = $request->$column;
        }
        Auth::user()->houses()->save($house);
        return redirect('/house/mypage')->with('flash_message', '編集が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house=House::findOrFail($id);
        $house->delete();
        return redirect()->route('house.mypage')->with('delete_message', '削除が完了しました');
    }

    public function putImageToStorage($image){
        // アップロードされたファイル名を取得
        $file_name = $image->getClientOriginalName();

        // 取得したファイル名で保存
        $image->storeAs('public/images/', $file_name);
        
        return $file_name;
        
    }
}
