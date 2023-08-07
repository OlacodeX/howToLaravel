<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\FileStorage\FileStorage;
use App\Models\Tutorial;
use Livewire\WithFileUploads;

class EditTutorial extends Component
{
    use WithFileUploads;

    public $tutorial;
    public $image;
    public $uploadedImage = null;
    public $body;
    public $topic;
    public $tags = [];
    public $tagString;
    
    protected $rules = [
        'tagString' => 'nullable|string',
        'topic' => 'nullable|string|min:30|max:150',
        'uploadedImage' => 'nullable|image',
    ];
 
    protected $messages = [
        // 'body.required' => 'The tutorial cannot be empty.',
        'topic.nullable' => 'The tutorial topic cannot be empty.',
        'uploadedImage.nullable' => 'The tutorial banner cannot be empty',
        'topic.min:30' => 'Please enter minimum of 30 characters',
        'topic.max:150' => 'Please enter maximum of 150 characters',
        'tagString.nullable' => 'Tutorial tags cannot be empty',
    ];
    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->body = $tutorial->body;
        $this->topic = $tutorial->topic;
        $this->image = $tutorial->banner;
        $this->tags = $tutorial->tags;
        $this->tagString = implode(', ',$tutorial->tags);
    }
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

    public function updateTutorial()
    {
        $this->validate();
        if ($this->uploadedImage) {
            // $originName = $this->uploadedImage->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $this->uploadedImage->getClientOriginalExtension();
            // $fileName = $fileName.'_'.time().'.'.$extension;
            // $this->uploadedImage->storeAs('public/images', $fileName);
            // $this->uploadedImage = $fileName;
            
            $file_storage = new FileStorage('firebase');
            $firebase_storage_path = config('services.firebase.environment').'/'.'tutorials/'; 
            $originName = $this->uploadedImage->getClientOriginalName();
            $fileName  = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $this->uploadedImage->getClientOriginalExtension(); 
            $fileName = $fileName.'.'.$extension; 
            $localPath = 'storage/images/tutorials';
            $downloadUrl = $file_storage->store($this->uploadedImage, $firebase_storage_path, $localPath, $fileName); 
            $this->uploadedImage = $downloadUrl; 
        }
        
        $tutorial = Tutorial::find($this->tutorial->id);
        $tutorial->body = $this->body;
        $this->uploadedImage ? $tutorial->banner = $this->uploadedImage : null;
        $tutorial->tags = $this->tags;
        $tutorial->topic = $this->topic;
        $tutorial->save();
        $this->uploadedImage  = '';
        // $this->body = '';
        // $this->topic = '';
        // $this->tags = '';
        // $this->tagString = '';
        session()->flash('message', 'Tutorial updated successfully 😁');
        return redirect()->to('/my-tutorials');
    }
    public function render()
    {
        return view('livewire.edit-tutorial')->layout('layouts.tutor');
    }

}
