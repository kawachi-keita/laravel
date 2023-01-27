<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function houseRegister()
    {
        return view('auth.houseRegister');
    }
    public function guestRegister()
    {
        return view('auth.guestRegister');
    }
}
