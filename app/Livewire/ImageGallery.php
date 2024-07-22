<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class ImageGallery extends Component
{
    use WithFileUploads;
    public $files = [];
    public $photo;

    public function mount()
    {
        $GetFiles = File::files(public_path('phones_images'));

        $files = [];
        foreach ($GetFiles as   $value) {
            array_push($files, $value->getFilename());
        }

        $this->files = $files;
    }
    public function render()
    {


        $files = $this->files;

        return view('livewire.image-gallery', compact('files'));
    }
    public function save()
    {

        $this->validate([
            'photo' => 'image',
        ]);

        $aa = $this->photo->store('', 'phones');
    }
}
