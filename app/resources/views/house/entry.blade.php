@extends('layouts.app')

@section('content')
    <div class="list">
        <div class="card mx-auto">
            <div class="card-header text-center">{{ __('物件情報登録') }}</div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">物件画像</label>
                    <input type="file" class="form-control-file " id="exampleFormControlFile1">
                    <input type="file" class="form-control-file mt-4" id="exampleFormControlFile2">
                    <input type="file" class="form-control-file mt-4" id="exampleFormControlFile3">
                </div>
            </form>
            <div class="col-md-7 mx-center">
                <form>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">物件名</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">物件住所</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">価格</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">広さ・間取り</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form>
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">物件の紹介</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>
        <form>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">周辺情報</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">戻る</button>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
    </div>


    
@endsection