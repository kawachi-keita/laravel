@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件情報登録') }}</div>
        </div>
    </div>
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    <div class="container mt-5">
        <form method="POST" action="{{ route('house.conf') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <label for="image">物件画像</label>
                    <div>
                        <input id="image1" type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" value="{{ old('image1') }}"  autocomplete="image1" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input id="image2" type="file" class="form-control mt-4 @error('image2') is-invalid @enderror" name="image2" value="{{ old('image2') }}"  autocomplete="image2" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adress" class="col-sm-2 col-form-label">物件住所</label>
                        <div class="col-sm-10">
                            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                            @error('adress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">価格</label>
                        <div class="col-sm-10">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- プルダウン -->
                    <!-- <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">広さ</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="size" name="size" value="{{ old('size') }}" required autocomplete="size" autofocus>
                                <option>40㎡以下</option>
                                <option>41~50㎡</option>
                                <option>51~60㎡</option>
                                <option>61~70㎡</option>
                                <option>71~80㎡</option>
                                <option>81~90㎡</option>
                                <option>100㎡以上</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">広さ</label>
                        <div class="col-sm-10">
                            <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" required autocomplete="size" autofocus>
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
                            <input id="layout" type="text" class="form-control @error('layout') is-invalid @enderror" name="layout" value="{{ old('layout') }}" required autocomplete="layout" autofocus>
                            @error('layout')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group col-md-6">
                    <label for="comment">物件の紹介</label>
                    <div>
                        <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment"  value="{{ old('comment') }}" required autocomplete="comment" autofocus></textarea>

                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group col-md-6">
                    <label for="information">周辺情報</label>
                    <div>
                        <textarea id="information" class="form-control @error('information') is-invalid @enderror" name="information"  value="{{ old('information') }}" required autocomplete="information" autofocus></textarea>

                        @error('information')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary w-25" onClick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary w-25">確認</button>
            </div> 
        </form>
    </div>


    
@endsection