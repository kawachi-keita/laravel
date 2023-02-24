@extends('layouts.app')
@section('content')

<div class="mx-5 p-5">
    <div class="card mx-auto">
        <div class="card-header text-center">{{ __('物件詳細') }}</div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="">
            @if($house->image1)
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @else
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @endif
        </div>
        <div class="">
            @if($house->image2)
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image2) }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @else
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @endif
        </div>
        <div>
            @if($house->image3)
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image3) }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @else
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
            @endif
        </div>
    </div>
    <div class="mx-5 p-5">
        <div class="d-flex">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-2">物件名</dt>
                    <dd class="col-6">{{ $house->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-2">物件住所</dt>
                    <dd class="col-6">{{ $house->address }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-2">価格</dt>
                    <dd class="col-6">{{ $house->amount }}万円</dd>
                </dl>
                <dl class="row">
                    <dt class="col-2">広さ</dt>
                    <dd class="col-6">{{ $house->size }}㎡</dd>
                </dl>
                <dl class="row">
                    <dt class="col-2">間取り</dt>
                    <dd class="col-6">{{ $house->layout }}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-2">物件情報</dt>
                    <dd class="col-6">{{ $house->comment }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-2">周辺情報</dt>
                    <dd class="col-6">{{ $house->information }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <!-- <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">ユーザー名</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">プロフィール</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">
                    <a href="{{ route('admin.getUser', ['id' => $user['id']]) }}">{{ $user->id }}</a>
                </th>  
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->profile }}</td>
            </tr>
        @endforeach
        </tbody>
    </table> -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-outline-primary mr-4" role="button" onClick="history.back()">戻る</button>
        <a href="{{ url('/') }}" class="btn btn-outline-primary mr-5">TOPページに戻る</a>
    </div>

</div>
@endsection