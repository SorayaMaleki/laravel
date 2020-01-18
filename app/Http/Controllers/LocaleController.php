<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function index($locale){
        app()->setlocale($locale);
        return view('locale');
    }
}
