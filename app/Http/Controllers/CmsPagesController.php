<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsPagesController extends Controller
{
    public function whoweare(){
        $title = 'who we are - sawitinfo';
        $nav = 'pages';
        return view('backends.whoweare', compact('title', 'nav'));
    }
    public function sawitinfo(){
        $title = 'sawitinfo - sawitinfo';
        $nav = 'pages';
        return view('backends.sawitinfo', compact('title', 'nav'));
    }
}
