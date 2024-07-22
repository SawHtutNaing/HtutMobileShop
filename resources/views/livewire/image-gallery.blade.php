<div x-data="{ selectedFile: '' }">
    <h1>Files in Phones Directory</h1>
    <div class="container mx-auto">
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($files as $file)
                <div class="w-32 h-32 overflow-hidden" @click="selectedFile = '{{ $file }}'">
                    <img src="{{ asset('phones_images/' . $file) }}" class="object-cover w-full h-full cursor-pointer" alt="{{ $file }}">
                </div>
            @endforeach
        </div>
    </div>
    <div x-show="selectedFile" class="mt-4 p-4  rounded">
        Selected File: <span x-text="selectedFile"></span>
    </div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="photo">
     
        @error('photo') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>

       
    </form>
</div>
