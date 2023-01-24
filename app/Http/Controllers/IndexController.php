<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $title = 'Index - Sawit Info';
        return view('frontends.index', compact('title'));
    }
}
