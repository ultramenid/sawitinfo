<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $title = 'Posts - Environmental Defender';
        $nav = 'posts';
        return view('backends.cmscases', compact('title','nav'));
    }

    public function add(){
        $title = 'New posts - Environmental Defender';
        $nav = 'posts';
        return view('backends.addposts', compact('title','nav'));
    }
    public function edit($id){
        $title = 'Edit posts - Environmental Defender';
        $nav = 'posts';
        $id = $id;
        return view('backends.editposts', compact('title','nav', 'id'));
    }
}
