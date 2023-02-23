@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-around m-5">
            <a href="{{ route('admin.searchHouse') }}" class="btn btn-primary btn-lg">①物件検索</a>

            <a href="{{ route('admin.searchUser') }}" class="btn btn-primary btn-lg">②ユーザー検索</a>
    </div>
</div>

@endsection