<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

use App\Models\Settings;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $blogs_slug;
    public $global_author;
    public $global_keywords;
    public $global_description;
    public $image;
    public $old_image;
    public $settings;
    
    protected function rules()
    {
        return [
            'blogs_slug' => 'string|required|min:5|not_in:blog,settings,user',
            'global_author' => 'string|required|min:5',
            'global_keywords' => 'nullable|min:5',
            'global_description' => 'nullable|min:5',
            'image' => 'nullable|image|max:1024',
        ];
    }

    public function mount(Settings $settings)
    {
        $this->blogs_slug = $settings->blogs_slug;
        $this->global_author = $settings->global_author;
        $this->global_keywords = $settings->global_keywords;
        $this->global_description = $settings->global_description;
        $this->old_image = $settings->image;
    }

    public function submit()
    {
        $this->blogs_slug = Str::lower($this->blogs_slug);

        $this->validate();

        $settings = $this->settings;

        $settings->blogs_slug = $this->blogs_slug;
        $settings->global_author = $this->global_author;
        $settings->global_keywords = $this->global_keywords;
        $settings->global_description = $this->global_description;

        if ($this->image != null) {
            $image_extension = $this->image->getClientOriginalExtension();
            $image_url = $this->image->storeAs('images', config('app.name', 'Laravel') . $image_extension);
            $image_url = url($image_url);
            $settings->image = $image_url;
        }

        $settings->save();

        session()->flash('flash.banner', 'Settings successfully edited');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
