<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tutorial;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyTutorials extends Component
{
    use WithPagination;

    public function deleteTutorial($tutorialId)
    {
        $tutorial = Tutorial::find($tutorialId);
        $tutorial->image ? Storage::disk('public/images')->delete($tutorial->image) : null;
        $tutorial->delete();
        session()->flash('message', 'Tutorial deleted successfully 😊');
        return redirect()->to('/my-tutorials');
    }
    public function render()
    {
        return view('livewire.my-tutorials',[
            'userTutorials' => Auth::user()->tutorials()->orderBy('created_at','desc')->paginate(10),
        ])->layout('layouts.tutor');
    }
}
