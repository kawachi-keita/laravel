@extends('layouts.app')

@section('content')
    <div class="mx-5 p-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件情報確認') }}</div>
        </div>
        <form method="POST" action="{{ route('house.store') }}">
        @csrf
        <dt for="image" class="col-2">物件画像</dt>
        <div class="d-flex justify-content-between">
            <div class="image-group">
                    <img src="{{ asset('storage/images/'.$input->image1) }}" style="width:auto; height:200px;" alt="">
                    <input id="image1" type="hidden" class="form-control" name="image1" value="{{ $input->image1 }}"  autocomplete="image1" autofocus>
            </div>
            <div class="image-group">
                    <img src="{{ asset('storage/images/'.$input->image2) }}" style="width:auto; height:200px;" alt="">
                    <input id="image2" type="hidden" class="form-control" name="image2" value="{{ $input->image2 }}"  autocomplete="image2" autofocus>
            </div>
            <div class="image-group">
                    <img src="{{ asset('storage/images/'.$input->image3) }}" style="width:auto; height:200px;" alt="">
                    <input id="image3" type="hidden" class="form-control" name="image3" value="{{ $input->image3 }}"  autocomplete="image3" autofocus>
            </div>
        </div>
        <div class="mx-5 p-5">
            <div class="d-flex">
                <div class="col-md-6">
                    <dl class="row">
                        <dt for="name" class="col-2">物件名</dt>
                        <dd class="col-6">{{ $input['name'] }}
                            <input id="name" type="hidden" class="form-control" name="name" value="{{ $input->name }}" required autocomplete="name" autofocus>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt for="address" class="col-2">物件住所</dt>
                        <dd class="col-6">{{ $input['address'] }}
                            <input id="address" type="hidden" class="form-control" name="address" value="{{ $input->address }}" required autocomplete="address" autofocus>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt for="amount" class="col-2">価格</dt>
                        <dd class="col-6">{{ $input['amount'] }}万円
                            <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $input->amount }}" required autocomplete="amount" autofocus>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt for="size" class="col-2">広さ</dt>
                        <dd class="col-6">{{ $input['size'] }}㎡
                            <input id="size" type="hidden" class="form-control" name="size" value="{{ $input->size }}" required autocomplete="size" autofocus>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt for="layout" class="col-2">間取り</dt>
                        <dd class="col-6">{{ $input['layout'] }}
                            <input id="layout" type="hidden" class="form-control" name="layout" value="{{ $input->layout }}" required autocomplete="layout" autofocus>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-8">
                    <dl class="row">
                        <dt for="comment" class="col-2">物件情報</dt>   
                        <dd class="col-6">{{ $input['comment'] }}</dd>
                    </dl>
                    <textarea id="comment" style="display:none" class="form-control" name="comment" required autocomplete="comment" autofocus>{{ $input->comment }}</textarea>
                    <dl class="row">
                        <dt for="information" class="col-2">周辺情報</dt>
                        <dd class="col-6">{{ $input['information'] }}</dd>
                    </dl>
                    <textarea id="information" style="display:none" class="form-control" name="information" required autocomplete="information" autofocus>{{ $input->information }}</textarea>
                </div>
            </div>
        </div>
            <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary w-25 mr-4" onClick="history.back()">戻って変更する</button>
            <button class="btn btn-primary w-25" type="submit">確認して登録する</button>
            </div> 
        </form>
    </div>


    
@endsection