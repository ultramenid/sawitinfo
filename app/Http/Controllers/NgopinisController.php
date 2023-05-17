<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NgopinisController extends Controller
{
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

    public function index($lang, $slug){
        $data = $this->getdataSlug($slug);
        $title = $data->title;
        $desc = $data->description;
        $tags = explode(',', $data->tags);;
        return view('frontends.ngopini', compact('data', 'title', 'desc', 'tags'));
    }

    public function ngopinis(){
        $title = 'Sawit - Posts';
        return view('frontends.ngopinis', compact('title'));
    }
}
