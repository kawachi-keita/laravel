@extends('layouts.app')

@section('content')
    <div class="mx-5 p-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件申込画面') }}</div>
        </div>
        <dt class="">
            <label for="image">物件画像</label>
        </dt>
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
            <div class="">
                @if($house->image3)
                    <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image3) }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
                @else
                    <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="280px" role="img" aria-label="Placeholder: Image cap">
                @endif 
            </div>
        </div> 
        <div class="mx-5 p-5">
            <div class="d-flex justify-content-between mt-3">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-2">
                            <label for="name">物件名</label>
                        </dt>
                        <dd class="col-6">
                            <label for="name" class="ml-5">{{ $house->name }}</label>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-2">
                            <label for="address">物件住所</label>
                        </dt>
                        <dd class="col-6">
                            <label for="address" class="ml-5">{{ $house->address }}</label>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-2">
                            <label for="amount">価格</label>
                        </dt>
                        <dd class="col-6">
                            <label for="amount" class="ml-5">{{ $house->amount }}万円</label>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-2">
                            <label for="size">広さ</label>
                        </dt>
                        <dd class="col-6">
                            <label for="size" class="ml-5">{{ $house->size }}㎡</label>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-2">
                            <label for="layout">間取り</label>
                        </dt>
                        <dd class="col-6">
                            <label for="layout" class="ml-5">{{ $house->layout }}</label>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-2">
                            <label for="comment">物件情報</label>
                        </dt>
                        <dd class="col-6">
                            <label for="comment" class="ml-5">{{ $house->comment }}</label>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-2">
                            <label for="information">周辺情報</label>
                        </dt>
                        <dd class="col-6">
                            <label for="information" class="ml-5">{{ $house->information }}</label>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
       
        <div class="container">
            <form method="POST" action="{{ route('post.conf') }}">
                @csrf
                <input type="hidden" name="house_id" value="{{ $house->id }}">
                <div class="d-flex justify-content-center">
                    <div class="col-md-7 mx-center">
                        <div class="form-group">
                            <label for="date_at" class="col-sm-2 col-form-label">申込日付</label>
                                <input id="date_at" type="date" class="form-control @error('date_at') is-invalid @enderror" name="date_at" value="{{ old('date_at') }}" required autocomplete="date_at" autofocus>
                                @error('date_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="time" class="col-sm-2 col-form-label">申込時間</label>
                            <select class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" id="time" >
                                <option value="9:00~10:00">9:00~10:00</option>
                                <option value="10:00~11:00">10:00~11:00</option>
                                <option value="11:00~12:00">11:00~12:00</option>
                                <option value="12:00~13:00">12:00~13:00</option>
                                <option value="13:00~14:00">13:00~14:00</option>
                                <option value="14:00~15:00">14:00~15:00</option>
                                <option value="15:00~16:00">15:00~16:00</option>
                                <option value="16:00~17:00">16:00~17:00</option>
                                <option value="17:00~18:00">17:00~18:00</option>
                                <option value="18:00~19:00">18:00~19:00</option>
                                <option value="19:00~20:00">19:00~20:00</option>
                            </select>
                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="question">問い合わせ内容</label>
                                <textarea id="question" class="form-control @error('question') is-invalid @enderror" name="question"  value="{{ old('question') }}" required autocomplete="question" autofocus></textarea>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary mr-4" onClick="history.back()">戻る</button>
                    <button type="submit" class="btn btn-primary">確認画面へ</button>
                </div>
            </form>
        </div>
    </div>


    
@endsection