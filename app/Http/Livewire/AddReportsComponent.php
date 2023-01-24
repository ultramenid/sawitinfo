<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddReportsComponent extends Component
{
    use WithFileUploads;
    public $photo, $tags = [], $tag, $publishdate, $isactive = 0, $titleID, $titleEN, $descID, $descEN;

    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager();

        // https://image.intervention.io/v2/api/fit
        $image = $manager->make('storage/files/photos/'.$foto)->fit(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
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

    public function storeReports(){
        if($this->manualValidation()){
            DB::table('reports')->insert([
                'img' => $this->uploadImage(),
                'publishdate' => $this->publishdate,
                'tags' => $this->getTags(),
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'descID' => $this->titleID,
                'descEN' => $this->titleEN,
                'is_active' => $this->isactive,
                'slug' => Str::slug($this->titleID,'-'),
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
            redirect()->to('/cms/reports');
        }
    }

    public function render(){
        return view('livewire.add-reports-component');
    }

    public function updatedPhoto($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           $message = 'Files not supported';
           $type = 'error'; //error, success
           $this->emit('toast',$message, $type);
        }

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
