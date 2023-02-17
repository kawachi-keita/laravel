@extends('layouts.app')
@section('content')

<div class="mx-5 p-5">
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件情報詳細') }}</div>
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
                <h5 class="card-title">{{ $house->adress }}</h5>
                <p class="card-text">{{ $house->amount }}万円</p>
                <p class="card-text">{{ $house->size }}㎡</p>
                <p class="card-text">{{ $house->layout }}</p>
                <p class="card-text">{{ $house->comment }}</p>
                <p class="card-text">{{ $house->information }}</p>

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
            <a href="{{route('post.create',['houseId'=>$house->id])}}" class="btn btn-success mt-2">お申込みへ</a>
        </div>
    </div>
   
</div>
@endsection

<style>
    .loved i {
        color: red !important;
    }
</style>