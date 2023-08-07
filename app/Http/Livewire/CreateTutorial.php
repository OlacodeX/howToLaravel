<?php

namespace App\Http\Livewire;

use App\Enums\Status;
use Livewire\Component;
use App\Models\Tutorial;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Services\FileStorage\FileStorage;

class CreateTutorial extends Component
{
    use WithFileUploads;

    public $image;
    public $body;
    public $topic;
    public $isDraft = false;
    public $status = 0;
    public $tags = [];
    public $tagString;
    public $draftRules = [
        'tagString' => 'nullable|string',
        'topic' => 'required|string|min:30|max:150',
        'image' => 'nullable|image',
    ];
    
    protected $rules = [
        'tagString' => 'required|string',
        'topic' => 'required|string|min:30|max:150',
        'image' => 'required|image',
    ];
 
    protected $messages = [
        // 'body.required' => 'The tutorial cannot be empty.',
        'topic.required' => 'The tutorial topic cannot be empty.',
        'image.required' => 'The tutorial banner cannot be empty',
        'image.image' => 'The tutorial banner must be an image',
        'topic.min:30' => 'Please enter minimum of 30 characters',
        'topic.max:150' => 'Please enter maximum of 150 characters',
        'tagString.nullable' => 'Tutorial tags cannot be empty',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function handleTags()
    {
        if ($this->tagString) {
            $this->tags = explode(",", $this->tagString);
        }
    }
    public function saveDraft()
    {
        $this->status = 1;
        $this->isDraft = true;
        return $this->addTutorial();
    }
    // public function saveInReview()
    // {
    //     $this->status = 2;
    //     $this->isDraft = false;
    //     return $this->addTutorial();
    // }
    public function saveActive()
    {
        $this->status = 0;
        $this->isDraft = false;
        return $this->addTutorial();
    }

    public function addTutorial()
    {
        if (!$this->isDraft) {
            $this->validate();
        }else{
            $this->validate($this->draftRules);
        }
        if ($this->image) {
            $file_storage = new FileStorage('firebase');
            $firebase_storage_path = config('services.firebase.environment').'/'.'tutorials/'; 
            $originName = $this->image->getClientOriginalName();
            $fileName  = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $this->image->getClientOriginalExtension(); 
            $fileName = $fileName.'.'.$extension; 
            $localPath = 'storage/images/tutorials';
            $downloadUrl = $file_storage->store($this->image, $firebase_storage_path, $localPath, $fileName); 
            $this->image = $downloadUrl; 
        }
    
        $createdTutorial = new Tutorial;
        $createdTutorial->body = $this->body;
        $createdTutorial->author_id = Auth::user()->id;
        $createdTutorial->banner = $this->image;
        $createdTutorial->tags = $this->tags;
        $createdTutorial->topic = $this->topic;
        $createdTutorial->status = Status::tryfrom($this->status)->value;
        $createdTutorial->save();
        $this->body = '';
        $this->topic = '';
        $this->tags = '';
        $this->tagString = '';
        $this->image  = '';
        $this->isDraft ? session()->flash('message', 'Tutorial draft saved successfully 😁') : session()->flash('message', 'Tutorial added successfully 😁');
        return redirect()->to('/my-tutorials');
    }

    public function render()
    {
        return view('livewire.create-tutorial')->layout('layouts.tutor');
    }
}
