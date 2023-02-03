<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['max:1024','mimes:jpg,jpeg,png,gif'],
            'profile' => ['required', 'string', 'max:300'],
            'role' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($data)
    {
        //vendorのRegisterUser.phpを一部修正。板橋さん確認
        if(!is_null($data->image)){
            // ディレクトリ名
            $dir = 'icon';
    
            // アップロードされたファイル名を取得
            $file_name = $data->file('image')->getClientOriginalName();
    
            // 取得したファイル名で保存
            $data->file('image')->storeAs('public/' . $dir, $file_name);
    
            }

        return User::create([
            'name' => $data->name,
            'image' => !empty($data->image) ? $file_name : null,
            'profile' => $data->profile,
            'role' => $data->role,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }
}
