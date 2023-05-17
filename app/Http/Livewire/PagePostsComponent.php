<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagePostsComponent extends Component
{
    use WithPagination;
    public function selectPosts(){
        if(App::getLocale() == 'id'){
            return ('slug, titleID as title, descID as description, img, category, publishdate');
        }else{
            return ('slug, titleEN as title, descEN as description, img, category, publishdate');
        }
    }
    public function getPosts(){
        return DB::table('posts')->selectRaw($this->selectPosts())
        ->whereIn('category', ['analysis', 'cases', 'expose'])
        ->orderByDesc('publishdate')
        ->paginate(6);
    }
    public function render(){
        $data = $this->getPosts();
        return view('livewire.page-posts-component', compact('data'));
    }
}
