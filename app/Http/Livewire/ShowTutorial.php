<?php

namespace App\Http\Livewire;

use App\Models\Tutorial;
use Livewire\Component;

class ShowTutorial extends Component
{ 
    public $tutorial;
 
    public function mount($slug){
        $this->tutorial = Tutorial::where('slug', $slug)->with(['author'])->firstorFail();
    }

    public function render()
    {
        return view('livewire.show-tutorial');
    }
}
