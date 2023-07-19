<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tutorial;

class Tutorials extends Component
{
    public $tid;

    public function tut(Tutorial $tutorial)
    {
        dd($tutorial);
    }
    public function render()
    {
        return view('livewire.tutorials', [
            'tutorials' => Tutorial::latest()->get(),
        ]);
    }
}
