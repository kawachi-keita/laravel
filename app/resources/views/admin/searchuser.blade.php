@extends('layouts.app')
@section('content')

<div class="">
    <div class="mx-5 p-5 row justify-content-center" style="margin:0 auto;">
        <div class="col-md-10">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('admin.searchUser') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="name">ユーザー名</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    
                    <div class="form-group col-md-6 ">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile">プロフィール</label>
                        <input type="text" class="form-control" id="profile" name="profile">
                    </div>
                    
                    <button type="submit" class="btn btn-info btn-lg mx-auto">ユーザー検索</button>
                </form>
            </div>
        </div>
    </div>
    </div>

<div class="mx-5 p-5">
    <div class="mx-5">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('ユーザー一覧') }}</div>
        </div>
   
        @if(!is_null($users))
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">ユーザー名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">プロフィール</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                <th scope="row">
                <a href="{{ route('admin.getUser', ['id' => $user['id']]) }}">{{ $user->id }}</a>
                </th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->profile }}</td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mb-5">
            {{ $users->links() }}
            @if (count($users) >0)
            <p>全{{ $users->total() }}件中 
                {{  ($users->currentPage() -1) * $users->perPage() + 1}} - 
                {{ (($users->currentPage() -1) * $users->perPage() + 1) + (count($users) -1)  }}件のデータが表示されています。</p>
            @else
            <p>データがありません。</p>
            @endif 
        </div>
        @endif
    </div>
</div>
@endsection