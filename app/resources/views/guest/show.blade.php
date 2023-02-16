@extends('layouts.app')
@section('content')

<div class="mx-5 p-5">
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件一覧') }}</div>
        </div>
        <div class="d-flex flex-wrap m-auto">
    
        <div class="card" style="width: 18rem;">
                @if($house->image1)
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                @else
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                @endif

            <div class="card-body">
                <h5 class="card-title">{{ $house->name }}</h5>
                <p class="card-text">{{ $house->comment }}</p>
            </div>
            @if($bool)
            <p class="favorite-marke">
            <p class="js-like-toggle loved" data-houseid="{{ $house->id }}"><i class="fas fa-regular fa-star"></i></p>
            <span class="likesCount">{{ $likesCount }}</span>
            </p>
            @else
            <p class="favorite-marke">
            <p class="js-like-toggle" data-houseid="{{ $house->id }}"><i class="fas fa-regular fa-star"></i></p>
            <span class="likesCount">{{ $likesCount }}</span>
            </p>
            @endif
        </div>
    </div>
    <a href="{{route('post.create')}}" class="btn btn-success mt-2">新規投稿</a>
</div>
@endsection

<style>
    .loved i {
        color: red !important;
    }
</style>