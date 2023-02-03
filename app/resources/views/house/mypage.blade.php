@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="user col-md-5 mx-center">
                
                <h4>{{ Auth::user()->name }}</h4>
                    <table class="table table-striped">  
                        <thead>
                            <tr><th >プロフィール</th></tr>
                        </thead>
                        <tbody>
                        <tr><td>{{ Auth::user()->profile }}</td></tr>
                    </tbody>
                    </table>
            
            </div>

            <div class="btn-group-vertical">
                <a href="{{route('house.entry')}}" class="btn btn-success mt-2">新規投稿</a>
                <a href="" class="btn btn-success mt-2">お気に入り物件一覧</a>
                <a href="" class="btn btn-success mt-2">ユーザー情報編集</a>
            </div>
        </div>
    </div>

    <div class="list mt-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件一覧') }}</div>
        </div>
        
    </div>
        


    
 @endsection