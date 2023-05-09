<?php

namespace App\Http\Livewire\Blogs;

use Livewire\Component;

use App\Models\Blog;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $published;
    public $use_global;
    public $keywords;
    public $description;
    public $image;
    public $body;
    public $old_image;
    public $blog;
    
    protected function rules()
    {
        return [
            'title' => 'string|required|min:8',
            'slug' => 'required|unique:blogs,slug,'.$this->blog->id,
            'published' => 'boolean|required',
            'use_global' => 'boolean|required',
            'keywords' => 'nullable|min:8',
            'description' => 'string|required|min:8',
            'image' => 'nullable|image|max:1024',
            'body' => 'nullable',
        ];
    }

    public function mount(Blog $blog)
    {
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->published = $blog->published;
        $this->use_global = $blog->use_global;
        $this->keywords = $blog->keywords;
        $this->description = $blog->description;
        $this->old_image = $blog->image;
        $this->body = $blog->body;
    }

    public function submit()
    {
        $this->validate();

        $blog = $this->blog;

        $blog->title = $this->title;
        $blog->slug = $this->slug;
        $blog->published = $this->published;
        $blog->use_global = $this->use_global;
        $blog->keywords = $this->keywords;
        $blog->description = $this->description;

        if ($this->image != null) {
            $image_extension = $this->image->getClientOriginalExtension();
            $image_url = $this->image->storeAs('images', $this->slug . '-image.' . $image_extension);
            $image_url = url($image_url);
            $blog->image = $image_url;
        }

        $blog->body = $this->body;

        $blog->save();

        session()->flash('message', 'Blog successfully edited');
    }

    public function render()
    {
        return view('livewire.blogs.edit');
    }
}
