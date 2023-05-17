<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CmsInthenewsComponent extends Component
{
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $search = '';



    public function getNews(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('inthenews')
                        ->select('id', 'titleID', 'sourcename', 'is_active', 'publishdate')
                        ->where('titleID', 'like', $sc)
                        // ->orderBy($this->dataField, $this->dataOrder)
                        ->orderByDesc('publishdate')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }
     // refresh page on search
     public function updatedSearch(){
        $this->resetPage();
    }
    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('inthenews')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('inthenews')->where('id', $id)->delete();

        $message = 'Successfully deleting in the news ';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }
    public function render()
    {
        $news = $this->getNews();
        return view('livewire.cms-inthenews-component', compact('news'));
    }
}
