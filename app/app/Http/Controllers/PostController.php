<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
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

    public function complete(CreateData $request) {

        $income = new Income;

        $columns = ['amount', 'date', 'type_id', 'comment'];
        foreach($columns as $column) {
            $income->$column = $request->$column;
        }
        Auth::user()->income()->save($income);

        return redirect('/');

    }
}
