<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPostsComponent extends Component
{
    use WithFileUploads;
    public $photo, $uphoto, $idpost, $tags, $tag;
    public $titleID, $titleEN, $descID, $descEN, $isactive = 0, $publishdate, $category, $contentID, $contentEN;

    public function mount($id){
        $this->idpost = $id;
        $data = DB::table('posts')->where('id', $id)->first();
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN;
        $this->descID = $data->descID;
        $this->descEN = $data->descEN;
        $this->isactive = $data->is_active;
        $this->publishdate = $data->publishdate;
        $this->category = $data->category;
        $this->contentEN = $data->contentEN;
        $this->contentID = $data->contentID;
        $this->uphoto = $data->img;
        $this->tags = explode(',', $data->tags);
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

    public function storePosts(){
        if($this->manualValidation()){
            if(!$this->photo){
                $name = $this->uphoto;
            }else{
                    Storage::delete('public/files/photos/'.$this->uphoto);
                    Storage::delete('public/files/photos/thumbnail/'.$this->uphoto);
                     $name=  $this->uploadImage();


            }
            DB::table('posts')
            ->where('id', $this->idpost)
            ->update([
                'publishdate' => $this->publishdate,
                    'img' => $name,
                    'tags' => $this->getTags(),
                    'descEN' => $this->descEN,
                    'descID' => $this->descID,
                    'titleEN' => $this->titleEN,
                    'titleID' => $this->titleID,
                    'is_active' => $this->isactive,
                    'contentID' => $this->contentID,
                    'contentEN' => $this->contentEN,
                    'category' => $this->category,
                    'slug' => Str::slug($this->titleID,'-'),
                    'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            //passing to toast
            $message = 'Successfully updating posts';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);

        }
    }
    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager();

        // https://image.intervention.io/v2/api/fit
        $image = $manager->make('storage/files/photos/'.$foto)->fit(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
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
    public function render()
    {
        return view('livewire.edit-posts-component');
    }

    public function manualValidation(){
        if(strlen($this->titleID) > 120){
            $message = 'Title indonesia max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->titleID == '' ){
            $message = 'Title indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->titleEN) > 120){
            $message = 'Title english max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->titleEN == '' ){
            $message = 'Title english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descID == '' ){
            $message = 'Description indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->descID) > 155 ){
            $message = 'Description Indonesia max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descEN == '' ){
            $message = 'Description english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif(strlen($this->descEN) > 155 ){
            $message = 'Description english max limit 120 character';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->contentID == '' ){
            $message = 'Content indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->contentEN == '' ){
            $message = 'Content english is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->publishdate == '' ){
            $message = 'Publish date  is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->category == '' ){
            $message = 'Category is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->tags == [] ){
            $message = 'Tags is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
