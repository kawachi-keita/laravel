@extends('layouts.app')

@section('content')
    <div class="mx-5 p-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('申込情報確認') }}</div>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="{{ route('post.complete') }}">
            @csrf
            <input type="hidden" name="house_id" value="{{ $input['house_id'] }}">
                <div class="mx-auto d-block">
                    <div class="d-flex justify-content-center">
                        <dt class="mr-5">
                            <label for="date_at">申込日付</label>
                        </dt>
                        <div class="col-sm-5">
                            <p>{{ $input['date_at'] }}</p>
                            <input id="date_at" type="hidden" class="form-control" name="date_at" value="{{ $input->date_at }}" required autocomplete="date_at" autofocus>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                            <dt class="mr-5">
                                <label for="time">申込時間</label>
                            </dt>    
                            <div class="col-sm-5">
                                <p>{{ $input['time'] }}</p>
                                <input id="time" type="hidden" class="form-control" name="time" value="{{ $input->time }}" required autocomplete="time" autofocus>
                            </div>
                        
                    </div>
                    <div class="d-flex justify-content-center">
                            <dt class="mr-5">
                                <label for="question">問い合わせ内容</label>
                            </dt>
                            <div class="col-sm-5">
                                <p>{{ $input['question'] }}</p>
                                <textarea id="question" style="display:none" class="form-control" name="question" required autocomplete="question" autofocus>{{ $input->question }}</textarea>
                            </div>
                    </div>
                </div>
            
            <div class="d-flex justify-content-center mt-5">
                <button type="button" class="btn btn-outline-primary w-25 mr-4" onClick="history.back()">戻って変更する</button>
                <button class="btn btn-success w-25" type="submit">確認して申込む</button>
            </div> 
        </form>
    </div>


    
@endsection