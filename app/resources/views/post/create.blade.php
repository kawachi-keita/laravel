@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件申込画面') }}</div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="house-group">
            <label for="image">物件画像</label>
            @if($house->image1)
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
            @else
                <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/dummy.png') }}" alt="画像を表示できません" width="auto" height="230px" role="img" aria-label="Placeholder: Image cap">
            @endif
        </div>
    
        <div class="col-md-7 mx-center">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ $house->name }}</label>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">{{ $house->address }}</label>
            </div>
            <div class="form-group row">
                <label for="amount" class="col-sm-2 col-form-label">{{ $house->amount }}万円</label>
            </div>
            <div class="form-group row">
                <label for="size" class="col-sm-2 col-form-label">{{ $house->size }}㎡</label>
            </div>
            <div class="form-group row">
                <label for="layout" class="col-sm-2 col-form-label">{{ $house->layout }}</label>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group col-md-6">
            <label for="comment">{{ $house->comment }}</label>
        </div>

        <div class="form-group col-md-6">
            <label for="information">{{ $house->information }}</label>
        </div>
    </div>

    <div class="container mt-5">
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
                <button type="button" class="btn btn-primary mr-4" onClick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary">確認画面へ</button>
            </div>
        </form>
    </div>


    
@endsection