<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SysController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
