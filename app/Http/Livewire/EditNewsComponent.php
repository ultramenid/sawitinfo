<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditNewsComponent extends Component
{
    public $tags =[], $tag, $publishdate, $titleID, $titleEN, $descEN, $descID, $sourcename, $sourceurl, $isactive, $idnews;

    public function mount($id){
        $this->idnews = $id;
        $data = DB::table('inthenews')->where('id', $id)->first();
        $this->tags = explode(',', $data->tags);
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN;
        $this->descEN = $data->descEN;
        $this->descID = $data->descID;
        $this->sourcename = $data->sourcename;
        $this->sourceurl = $data->sourceurl;
        $this->publishdate = $data->publishdate;
        $this->isactive = $data->is_active;
    }
    public function addTags(){
        array_push($this->tags, $this->tag);
        $this->tag = '';
    }
    public function deleteTags($id){
        unset($this->tags[$id]);
    }
    public function getTags(){
        return implode(',', $this->tags);
    }

    public function storeNews(){
        if($this->manualValidation()){
            DB::table('inthenews')
            ->where('id', $this->idnews)
            ->update([
                'publishdate' => $this->publishdate,
                'tags' => $this->getTags(),
                'sourcename' => $this->sourcename,
                'sourceurl' => $this->sourceurl,
                'titleEN' => $this->titleEN,
                'titleID' => $this->titleID,
                'descEN' => $this->descEN,
                'descID' => $this->descID,
                'is_active' => $this->isactive,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
            //passing to toast
            $message = 'Successfully updating in the news';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        }
    }
    public function render()
    {
        return view('livewire.edit-news-component');
    }

    public function manualValidation(){
        if($this->publishdate == ''){
            $message = 'Publish date is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->tags == []){
            $message = 'Tags is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->titleEN == ''){
            $message = 'Title english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sourcename == ''){
            $message = 'Source name is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sourceurl == ''){
            $message = 'Source url is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->sourcename) > 60){
            $message = 'Source name max limit 60 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->sourceurl) > 255){
            $message = 'Source url max limit 255 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->titleEN) > 120){
            $message = 'Title english max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->titleID == ''){
            $message = 'Title indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->titleID) > 120){
            $message = 'Title indonesia max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descEN == ''){
            $message = 'Description english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->descEN) > 160){
            $message = 'Description english max limit 160 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descID == ''){
            $message = 'Description indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->descID) > 160){
            $message = 'Description indonesia max limit 160 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
