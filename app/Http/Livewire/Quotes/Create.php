<?php

namespace App\Http\Livewire\Quotes;

use App\Models\Quote;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $authorId;
    public $authors;
    public $quote;
    public $source;
    public $coverImage;
    public $status = true;
    public $publishedAt;

        protected function rules() {
        return [
            'authorId' => 'required|integer',
            'quote' => 'required|string',
            'source' => 'nullable|string',
            'coverImage' => 'nullable|image|max:1024',
            'status' => 'required|boolean',
            'publishedAt' => 'required|date',
        ];
    }

    protected function messages() {
        return [
            'authorId.required' => 'Please select an author.',
            'quote.required' => 'The quote field is required.',
        ];
    }

    public function mount() {
        $this->authors = Author::all();
    }

    public function saveQuote() {
        $this->publishedAt = now();

        $this->validate();

        Quote::create([
            'author_id' => $this->authorId,
            'quote' => $this->quote,
            'source' => $this->source,
            'cover_image' => $this->coverImage,
            'status' => $this->status === true ? 'published' : 'draft',
            'published_at' => $this->publishedAt,
        ]);

        session()->flash('message', 'Quote created successfully.');

        // Reset form fields
        $this->reset(['authorId', 'quote', 'source', 'coverImage', 'status', 'publishedAt']);
    }

    public function render()
    {
        return view('livewire.quotes.create');
    }
}
