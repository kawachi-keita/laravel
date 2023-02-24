@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex row">
            <div>
                <img src="{{ asset('storage/icon/' . $user->image) }}" class="rounded-circle" width="150" height="150">
            </div>
            <div class="user col-md-5 mx-center">
                <h4>{{ $user->name }}</h4>
                <table class="table table-striped">  
                    <thead>
                        <tr><th >プロフィール</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>{{ $user->profile }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mx-5 p-5">
        <div class="mx-5">
            <div class="card mx-auto">
            @if($user->role == 1)
                <div class="card-header text-center">{{ $user->name }}さんの投稿一覧</div>
            @elseif($user->role == 2)
                <div class="card-header text-center">{{ $user->name }}さんの申込一覧</div>
            @endif
            </div>
            <div class="d-flex flex-wrap m-auto">
            @if($user->role == 1)
                @foreach($user->houses as $house)
            
                    <div class="card" style="width: 18rem;">
                        <a href="{{ route('admin.getHouse',$house->id) }}" class="">
                            @if($house->image1)
                            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                            @else
                            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $house->name }}</h5>
                            <p class="card-text">{{ $house->comment }}</p>
                        </div>
                    </div>
                @endforeach
            @elseif($user->role == 2)
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">物件名</th>
                        <th scope="col">物件住所</th>
                        <th scope="col">日付</th>
                        <th scope="col">時間</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user->posts as $post)
                        <tr>
                        <th scope="row">
                        <a href="{{ route('admin.getHouse', ['id' => $post->house_id]) }}">{{ $post->house->name }}</a>
                        </th>
                        <td>{{ $post->house->address }}</td>
                        <td>{{ $post->date_at }}</td>
                        <td>{{ $post->time }}</td>
                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary mr-4" role="button" onClick="history.back()">戻る</button>
            <a href="{{ url('/') }}" class="btn btn-outline-primary mr-5">TOPページに戻る</a>
        </div>
    </div>

@endsection
        
