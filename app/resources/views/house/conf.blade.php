@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件情報確認') }}</div>
        </div>
    </div>
    <div class="container mt-5 ">
    <form method="POST" action="{{ route('house.store') }}">
        @csrf
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <label for="image">物件画像</label>
                    <div>
                        <img src="{{ asset('storage/images/'.$input->image1) }}" style="width:auto; height:100px;" alt="">
                        <input id="image1" type="hidden" class="form-control" name="image1" value="{{ $input->image1 }}"  autocomplete="image1" autofocus>
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/'.$input->image2) }}" style="width:auto; height:100px;" alt="">
                        <input id="image2" type="hidden" class="form-control" name="image2" value="{{ $input->image2 }}"  autocomplete="image2" autofocus>
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/'.$input->image3) }}" style="width:auto; height:100px;" alt="">
                        <input id="image3" type="hidden" class="form-control" name="image3" value="{{ $input->image3 }}"  autocomplete="image3" autofocus>
                    </div>
                </div>
            
                <div class="col-md-7 mx-center">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">物件名</label>
                        <div class="col-sm-10">
                            <p>{{ $input['name'] }}</p>
                            <input id="name" type="hidden" class="form-control" name="name" value="{{ $input->name }}" required autocomplete="name" autofocus>
                           </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">物件住所</label>
                        <p>{{ $input['address'] }}</p>
                        <div class="col-sm-10">
                            <input id="address" type="hidden" class="form-control" name="address" value="{{ $input->address }}" required autocomplete="address" autofocus>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">価格</label>
                        <p>{{ $input['amount'] }}</p>万円
                        <div class="col-sm-10">
                            <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $input->amount }}" required autocomplete="amount" autofocus>
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
                        <p>{{ $input['size'] }}</p>㎡
                        <div class="col-sm-10">
                            <input id="size" type="hidden" class="form-control" name="size" value="{{ $input->size }}" required autocomplete="size" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="layout" class="col-sm-2 col-form-label">間取り</label>
                        <p>{{ $input['layout'] }}</p>
                        <div class="col-sm-10">
                            <input id="layout" type="hidden" class="form-control" name="layout" value="{{ $input->layout }}" required autocomplete="layout" autofocus>
                           </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-group col-md-6">
                    <label for="comment">物件の紹介</label>
                    <p>{{ $input['comment'] }}</p>
                    <div>
                        <textarea id="comment" style="display:none" class="form-control" name="comment" required autocomplete="comment" autofocus>{{ $input->comment }}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="information">周辺情報</label>
                    <p>{{ $input['information'] }}</p>
                    <div>
                        <textarea id="information" style="display:none" class="form-control" name="information" required autocomplete="information" autofocus>{{ $input->information }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary w-25 mr-4" onClick="history.back()">戻って変更する</button>
            <button class="btn btn-primary w-25" type="submit">確認して登録する</button>
            </div> 
        </form>
    </div>


    
@endsection