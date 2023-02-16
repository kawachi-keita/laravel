@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件申込画面') }}</div>
        </div>
    </div>
    <div class="container mt-5">
        <form method="POST" action="{{ route('post.conf') }}">
            @csrf
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