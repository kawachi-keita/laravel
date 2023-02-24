@extends('layouts.app')
@section('content')
    @if (session('flash_message'))  
        <div class="flash_message bg-success text-center py-3 my-0">
            {{ session('flash_message') }}
        </div>
    @elseif (session('delete_message'))
        <div class="alert alert-danger text-center py-3 my-0" role="alert">
            {{ session('delete_message') }}
        </div>
    @endif
    <div class="container">
        <div class="d-flex aline-mddle">
            <div>
                <img src="{{ asset('storage/icon/' . Auth::user()->image) }}" class="rounded-circle" width="150" height="150">
            </div>
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
            <div>
                <div class="btn-group-vertical">
                    <a href="{{ route('guest.favorite') }}" class="btn btn-outline-info">お気に入り物件一覧</a>
                    <a href="{{ route('user.edit',['user'=>Auth::id()]) }}" class="btn btn-outline-info">ユーザー情報編集</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 p-5">
        <div class="mx-5">
            <div class="card mx-auto">
                <div class="card-header text-center">{{ Auth::user()->name }}の申込一覧</div>
            </div>
            <div class="d-flex flex-wrap m-auto">
            @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <a href="{{ route('guest.show',$post->id) }}" class="">
                    @if($post->image1)
                    <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $post->image1) }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                    @else
                    <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                    @endif
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->comment }}</p>
                </div>
               
            </div>
            @endforeach
            </div>
        </div>
    </div>
   
@endsection