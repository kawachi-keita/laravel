@extends('layouts.app')
@section('content')

<div class="">
    <div class="mx-5 p-5 row justify-content-center" style="margin:0 auto;">
        <div class="col-md-10">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('admin.searchHouse') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="amount">価格</label>
                        <div class="d-flex justify-content-space-between">
                        <div>
                            <input type="number" class="form-control" id="amount" name="amount_row" placeholder="入力値100->100万円です">万円
                        </div>
                        ~
                        <div>
                            <input type="number" class="form-control" id="amount" name="amount_high" placeholder="入力値100->100万円です">万円
                        </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="size">広さ</label>
                        <div class="d-flex justify-content-space-between">
                        <div>
                            <input type="number" class="form-control" id="size" name="size_row" placeholder="入力値100->100㎡です">㎡
                        </div>
                        ~
                        <div>
                            <input type="number" class="form-control" id="size" name="size_high" placeholder="入力値100->100㎡です">㎡
                        </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="layout">間取り</label>
                        <div class="d-flex justify-content-space-between">
                        <div>
                            <input type="number" class="form-control" id="layout" name="layout_row" placeholder="1LDK,2LDK">
                        </div>
                        ~
                        <div>
                            <input type="number" class="form-control" id="layout" name="layout_high" placeholder="1LDK,2LDK">
                        </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">住所</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="東京都">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="free">フリーワード</label>
                        <input type="text" class="form-control" id="free" name="free" placeholder="東京都">
                    </div>
                    
                    <button type="submit" class="btn btn-info btn-lg mx-auto">物件検索</button>
                </form>
            </div>
        </div>
    </div>
    </div>

<div class="mx-5 p-5">
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件一覧') }}</div>
        </div>
   
        @if(!is_null($houses))
        <div class="d-flex flex-wrap m-auto">
            @foreach($houses as $house)
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
        </div>

        <div class="d-flex justify-content-center mb-5">
            {{ $houses->links() }}
            @if (count($houses) >0)
            <p>全{{ $houses->total() }}件中 
                {{  ($houses->currentPage() -1) * $houses->perPage() + 1}} - 
                {{ (($houses->currentPage() -1) * $houses->perPage() + 1) + (count($houses) -1)  }}件のデータが表示されています。</p>
            @else
            <p>データがありません。</p>
            @endif 
        </div>
        @endif
    </div>
</div>
@endsection