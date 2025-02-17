<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PolicyRegulationComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $search = '';

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('policyregulation')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('policyregulation')->where('id', $id)->delete();

        $message = 'Successfully deleting policyregulation ';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }

    public function getpolicyregulation(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('policyregulation')
                        ->select('id', 'titleID', 'is_active')
                        ->where('titleID', 'like', $sc)
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
    public function render()
    {
        $data = $this->getpolicyregulation();
        return view('livewire.policy-regulation-component', compact('data'));
    }
}
