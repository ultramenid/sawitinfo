<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagesSawitinfoComponent extends Component
{
    public $contentID, $contentEN;
    public function mount(){
        $data = DB::table('pagesawitinfo')->where('id', 1)->first();
        if($data){
            $this->contentEN = $data->contentEN;
            $this->contentID = $data->contentID;
        }else{
            $this->contentEN = '';
            $this->contentID = '';
        }
    }
    public function storeGroups(){
        if($this->manualValidation()){
            DB::table('pagesawitinfo')
            ->updateOrInsert(
                ['name' => 'sawitinfo', 'id' => 1],
                [
                    'contentEN' => $this->contentEN,
                    'contentID' => $this->contentID,
                ]
            );
        //passing to toast
        $message = 'Successfully updating page sawitinfo';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
        }
    }
    public function render()
    {
        return view('livewire.pages-sawitinfo-component');
    }
    public function manualValidation(){
        if($this->contentEN == ''){
            $message = 'content english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;

        }elseif($this->contentID == ''){
            $message = 'content indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
