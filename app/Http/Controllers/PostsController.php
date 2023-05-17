<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(){
        $title = 'Posts - Environmental Defender';
        $nav = 'posts';
        return view('backends.cmscases', compact('title','nav'));
    }

    public function posts(){
        $title = 'Sawit - Posts';
        return view('frontends.posts', compact('title'));
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

    public function selectData(){
        if(App::getLocale() == 'id'){
            return 'titleID as title, descID as description, category, contentID as content, tags, slug, img, publishdate';
        }else{
            return 'titleEN as title, descEN as description, category, contentEN as content, tags, slug, img, publishdate';
        }
    }
    public function getdataSlug($slug){
        return DB::table('posts')->selectRaw($this->selectData())->where('slug' , $slug)->first();
    }
    public function slug($lang ,$slug){
        $data = $this->getdataSlug($slug);
        $title = $data->title;
        $desc = $data->description;
        $tags = explode(',', $data->tags);;
        return view('frontends.slug', compact('data', 'title', 'desc', 'tags'));
    }
}
