<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tutorial;

class Tutorials extends Component
{
    public function render()
    {
        return view('livewire.tutorials', [
            'tutorials' => Tutorial::where('status', 0)->latest()->get(),
        ]);
    }
}
