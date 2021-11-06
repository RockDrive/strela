<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequisiteController extends Controller
{
    public function index(Request $request)
    {
        return view('requisites');
    }
}
