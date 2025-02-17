<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;
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

        $manager = new ImageManager(new Driver);

        // https://image.intervention.io/v2/api/fit
        $image = $manager->read('storage/files/photos/'.$foto)->cover(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        // dd($foto);
        return $foto;
    }

    public function updatedFileID(){
       $this->filenameID = $this->fileID->getClientOriginalName();
    }
    public function updatedFileEN(){
        $this->filenameEN = $this->fileEN->getClientOriginalName();
     }
    public function uploadReports(){
        $name1 = Carbon::now('Asia/Jakarta').'-'.$this->fileID->getClientOriginalName();
        $name2 = Carbon::now('Asia/Jakarta').'-'.$this->fileEN->getClientOriginalName();
        $file1 = $this->fileID->storeAs('public/files/reports', $name1);
        $file2 = $this->fileEN->storeAs('public/files/reports', $name2);
        return [$name1, $name2];
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
            if(!$this->fileID){
                // dd($this->filenameID);
                $name1 = $this->filenameID;
            }else{
                Storage::delete('public/files/reports/'.$this->filenameID);
                $name1 = $this->uploadReports()[0];
            }
            if(!$this->fileEN){
                // dd($this->filenameEN);
                $name2 = $this->filenameEN;
            }else{
                Storage::delete('public/files/reports/'.$this->filenameEN);
                $name2 = $this->uploadReports()[1];
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
                    'fileID' => $name1,
                    'fileEN' => $name2,
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
