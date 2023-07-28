<?php

namespace App\Http\Livewire;

use App\Models\Tutorial;
use Livewire\Component;
use Livewire\Exceptions\MethodNotFoundException;
use PhpParser\Node\Stmt\TryCatch;

class ShowTutorial extends Component
{ 
    public $tutorial;
 
    public function mount($slug){
        try {
            $this->tutorial = Tutorial::where('slug', $slug)->with(['author'])->firstorFail();
        } catch (MethodNotFoundException $exception) {
            // return view('livewire.home');
        }
    }

    public function render()
    {
        return view('livewire.show-tutorial');
    }
}
