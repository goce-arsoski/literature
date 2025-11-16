<?php

namespace App\Http\Livewire\Poem;

use Carbon\Carbon;
use App\Models\Poem;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $titleFocused = false;
    public $authorId;
    public $authors;
    public $coverImage;
    public $title;
    public $content;
    public $publishedAt;
    public $status = false; // 0 = draft, 1 = published

    protected function rules() {
        return [
            'authorId' => 'required|integer',
            'coverImage' => 'nullable|image|max:1024',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publishedAt' => 'required|date',
            'status' => 'required|boolean',
        ];
    }

    protected function messages() {
        return [
            'authorId.required' => 'Please select an author.',
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
        ];
    }

    public function mount() {
        // Load authors for the dropdown
        $this->authors = Author::all();
    }

    public function savePoem() {
        // dd($this->status);
        $this->publishedAt = Carbon::now(); // Set current time as published_at

        $this->validate();

        // Save to database
        Poem::create([
            'author_id' => $this->authorId,
            'cover_image' => $this->coverImage,
            'title' => $this->title,
            'content' => $this->content,
            'published_at' => $this->publishedAt,
            'status' => $this->status === true ? 'published' : 'draft',
        ]);

        // Reset form fields
        $this->reset(['coverImage', 'title', 'content', 'status']);

        return redirect()->route('poem.adminIndex');
    }

    public function render()
    {
        return view('livewire.poem.create');
    }
}
