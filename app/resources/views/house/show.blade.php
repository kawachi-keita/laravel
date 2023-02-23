@extends('layouts.app')
@section('content')

<div class="mx-5 p-5">
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件詳細') }}</div>
        </div>
        <div class="d-flex flex-wrap m-auto">
    
        <div class="card" style="width: 18rem;">
            <a href="{{ route('house.show',$house->id) }}" class="">
                @if($house->image1)
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                @else
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
                @endif
            </a>

            <div class="card-body">
                <h5 class="card-title">{{ $house->name }}</h5>
                <p class="card-text">{{ $house->amount }}万円</p>
                <p class="card-text">{{ $house->address }}</p>
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
        </div>
    </div>
</div>
@if(Auth::id() == $house->user_id)
<div class="d-flex justify-content-center">
    <div class='btn-toolbar' role="toolbar">
        <div class='d-flex justify-content-center mr-5'>
            <form action="{{ route('house.destroy', $house->id) }}" method="POST">
                @method('DELETE')
            @csrf
            <button type="submit" class ='btn btn-danger' onClick="delete_alert(event);return false;">削除</button>
            </form>
        </div>
        <div class='d-flex justify-content-center mr-5'>
            <a href="{{ route('house.edit', $house->id) }}">
                <button class ='btn btn-secondary'>編集</button>
            </a>
        </div>
    </div>
</div>
@endif
@endsection
<script>

function delete_alert(e){
    if(!window.confirm('本当に削除しますか？')){
        return false;
    }
    document.deleteform.submit();
};


</script>

<style>
    .loved i {
        color: red !important;
    }
</style>