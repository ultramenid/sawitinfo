<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InthenewsController extends Controller
{
    public function index(){
        $title = 'sawit in the news - sawitinfo';
        $nav = 'inthenews';
        return view('backends.inthenews', compact('title','nav'));
    }

    public function addnews(){
        $title = 'add news - sawitinfo';
        $nav = 'inthenews';
        return view('backends.addnews', compact('title','nav'));
    }

    public function edit($id){
        $id = $id;
        $title = 'edit news - sawitinfo';
        $nav = 'inthenews';
        return view('backends.editnews', compact('title', 'id', 'nav'));
    }
}
