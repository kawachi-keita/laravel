@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">登録が完了しました！</div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary mr-5">TOPページに戻る</a>
                    <a href="{{route('house.mypage')}}" class="btn btn-outline-primary ml-5">マイページに戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
