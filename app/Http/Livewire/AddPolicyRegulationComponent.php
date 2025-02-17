<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPolicyRegulationComponent extends Component
{
    use WithFileUploads;
    public $fileID, $fileEN, $titleID, $titleEN, $descID, $descEN, $publishdate, $isactive = 0;

    public function uploadReports(){
        $name1 = Carbon::now('Asia/Jakarta').'-'.$this->fileID->getClientOriginalName();
        $name2 = Carbon::now('Asia/Jakarta').'-'.$this->fileEN->getClientOriginalName();
        $file1 = $this->fileID->storeAs('public/files/policyregulation', $name1);
        $file2 = $this->fileEN->storeAs('public/files/policyregulation', $name2);
        // $file1 = 1;
        // $file2 = 2;

        return [$name1, $name2];
    }

    public function store(){
        if($this->manualValidation()){
            DB::table('policyregulation')->insert([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'descEN' => $this->descEN,
                'descID' => $this->descID,
                'fileID' => $this->uploadReports()[0],
                'fileEN' => $this->uploadReports()[1],
                'is_active' => $this->isactive,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
        }
    }


    public function render()
    {
        return view('livewire.add-policy-regulation-component');
    }

    public function manualValidation(){
        if($this->publishdate == ''){
            $message = 'Publish date is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->fileID == ''){
            $message = 'File Indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->fileEN == ''){
            $message = 'File English is required';
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
