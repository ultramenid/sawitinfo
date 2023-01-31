<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){
        $title = 'test';
        return view('frontends.detail', compact('title'));
    }
}
