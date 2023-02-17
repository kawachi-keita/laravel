@extends('layouts.app')
@section('content')
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ Auth::user()->name }}のお気に入り物件一覧</div>
        </div>
        <div class="d-flex flex-wrap m-auto">
        @foreach($houses as $house)
            <div class="card" style="width: 18rem;">
                <a href="{{ route('guest.show',$house->id) }}" class="">
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
        </div>

        <div class="d-flex justify-content-center mb-5">
            {{ $houses->links() }}
        </div>
    </div>
@endsection