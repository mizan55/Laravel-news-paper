<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function english()
    {
        Session::get('lang');
        session()->forget('lang');
        session()->put('lang','english');
        return redirect()->back();

    }
    public function bangla()
    {
        Session::get('lang');
        session()->forget('lang');
        session()->put('lang','bangla');
        return redirect()->back();
    }
}
