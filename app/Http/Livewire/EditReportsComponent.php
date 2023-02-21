<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Livewire\WithFileUploads;

class EditReportsComponent extends Component
{
    use WithFileUploads;
    public $idReports, $filenameID, $filenameEN;
    public $uphoto, $photo, $tags = [], $tag, $publishdate, $isactive = 0, $titleID, $titleEN, $descID, $descEN, $fileID, $fileEN;
    public function mount($id){
        $data = DB::table('reports')->where('id', $id)->first();
        $this->idReports = $id;
        $this->tags = explode(',', $data->tags);
        $this->publishdate = $data->publishdate;
        $this->isactive = $data->is_active;
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN;
        $this->descID = $data->descID;
        $this->descEN = $data->descEN;
        $this->fileID = $data->fileID;
        $this->fileEN = $data->fileEN;
        $this->filenameID = $data->fileID;
        $this->filenameEN = $data->fileEN;
        $this->uphoto = $data->img;
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

    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager();

        // https://image.intervention.io/v2/api/fit
        $image = $manager->make('storage/files/photos/'.$foto)->fit(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
    }

    public function updatedFileID(){
       $this->filenameID = $this->fileID->getClientOriginalName();
    }
    public function updatedFileEN(){
        $this->filenameEN = $this->fileEN->getClientOriginalName();
     }
    public function uploadReports(){
            if($this->fileID and $this->fileEN){
                $name1 = $this->fileID;
                $name2 = $this->fileEN;

                return [$name1, $name2];
            }else{
            $file1 = $this->fileID->store('public/files/reports');
            $file2 = $this->fileEN->store('public/files/reports');
            $name1 = $this->fileID->getClientOriginalName();
            $name2 = $this->fileEN->getClientOriginalName();

            return [$name1, $name2];
        }

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
            DB::table('reports')
            ->where('id', $this->idReports)
            ->update([
                'publishdate' => $this->publishdate,
                    'img' => $name,
                    'tags' => $this->getTags(),
                    'descEN' => $this->descEN,
                    'descID' => $this->descID,
                    'titleEN' => $this->titleEN,
                    'titleID' => $this->titleID,
                    'fileID' => $this->uploadReports()[0],
                    'fileEN' => $this->uploadReports()[1],
                    'is_active' => $this->isactive,
                    'slug' => Str::slug($this->titleID,'-'),
                    'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            //passing to toast
            $message = 'Successfully updating reports';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);

        }
    }
    public function render(){
        return view('livewire.edit-reports-component');
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
        }elseif($this->fileID == ''){
            $message = 'File is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->fileEN == ''){
            $message = 'File is required';
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
