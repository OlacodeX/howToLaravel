<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tutorial;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateTutorial extends Component
{
    use WithFileUploads;

    public $image;
    public $body;
    public $topic;
    public $tags = [];
    public $tagString;


    // protected $listeners = [
    //     'fileUpload'     => 'handleFileUpload',
    //     // 'ticketSelected' => 'setTicketId',
    // ];
    
    // public function handleFileUpload($imageData)
    // {
    //     $this->image = $imageData;
    // }
    
    protected $rules = [
        'tagString' => 'required|string',
        'topic' => 'required|string|min:30',
        'image' => 'required|image',
    ];
 
    protected $messages = [
        // 'body.required' => 'The tutorial cannot be empty.',
        'topic.required' => 'The tutorial topic cannot be empty.',
        'image.required' => 'The tutorial banner cannot be empty',
        'topic.min:30' => 'Please enter minimum of 30 characters',
        'tagString.required' => 'Please tags cannot be empty',
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
    // public function storeImage()
    // {
    //     if (!$this->image) {
    //         return null;
    //     }
        
       
    //     // return $this->image;
    // }

    public function addTutorial()
    {
        $this->validate();
        $originName = $this->image->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $this->image->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $this->image->storeAs('public/images', $fileName);
        $this->image = $fileName; 
    
        $createdTutorial = new Tutorial;
        $createdTutorial->body = $this->body;
        $createdTutorial->author_id = Auth::user()->id;
        $createdTutorial->banner = $fileName;
        $createdTutorial->tags = $this->tags;
        $createdTutorial->topic = $this->topic;
        $createdTutorial->save();
        $this->body = '';
        $this->topic = '';
        $this->tags = '';
        $this->tagString = '';
        $this->image  = '';
        session()->flash('message', 'Tutorial added successfully 😁');
    }

    public function render()
    {
        return view('livewire.create-tutorial')->layout('layouts.tutor');
    }
}
