@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件編集') }}</div>
        </div>
    </div>
    <div class="container mt-5">
        <form method="POST" action="{{ route('house.update',$house->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <label for="image">物件画像</label>
                    <div>
                        <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image1) }}" alt="画像を表示できません" width="auto" height="100px" role="img">
                        <input id="image1" type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" value="{{ old('image1') }}"  autocomplete="image1" autofocus>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image2) }}" alt="画像を表示できません" width="auto" height="100px" role="img">
                        <input id="image2" type="file" class="form-control mt-4 @error('image2') is-invalid @enderror" name="image2" value="{{ old('image2') }}"  autocomplete="image2" autofocus>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <img class="bd-placeholder-img card-img-top" src="{{ asset('storage/images/' . $house->image3) }}" alt="画像を表示できません" width="auto" height="100px" role="img">
                        <input id="image3" type="file" class="form-control mt-4 @error('image3') is-invalid @enderror" name="image3" value="{{ old('image3') }}"  autocomplete="image3" autofocus>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            
                <div class="col-md-7 mx-center">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">物件名</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$house->name) }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">物件住所</label>
                        <div class="col-sm-10">
                            <input id="address" type="text" class="form-control @error('adress') is-invalid @enderror" name="address" value="{{ old('address',$house->address) }}" required autocomplete="address" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">価格</label>
                        <div class="col-sm-10">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount',$house->amount) }}" required autocomplete="amount" autofocus>万円
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">広さ</label>
                        <div class="col-sm-10">
                            <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size',$house->size) }}" required autocomplete="size" autofocus>㎡
                            @error('size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="layout" class="col-sm-2 col-form-label">間取り</label>
                        <div class="col-sm-10">
                            <input id="layout" type="text" class="form-control @error('layout') is-invalid @enderror" name="layout" value="{{ old('layout',$house->layout) }}" required autocomplete="layout" autofocus>
                            @error('layout')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="comment" class="col-sm-2 col-form-label">物件の紹介</label>
                        <div class="col-sm-10">
                            <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" required autocomplete="comment" autofocus>{{ old('comment',$house->comment) }}</textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label for="information" class="col-sm-2 col-form-label">周辺情報</label>
                        <div class="col-sm-10">
                            <textarea id="information" class="form-control @error('information') is-invalid @enderror" name="information" required autocomplete="information" autofocus>{{ old('information',$house->information) }}</textarea>
                            @error('information')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary w-25 mr-5" onClick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary w-25 ml-5">編集する</button>
            </div> 
        </form>
    </div>


    
@endsection