<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

use App\Models\Settings;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $brand_logo;
    public $brand_text;
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
            'brand_logo' => 'nullable|image|max:1024',
            'brand_text' => 'string|nullable|min:5',
            'blogs_slug' => 'string|required|min:5|not_in:blog,settings,user',
            'global_author' => 'string|required|min:5',
            'global_keywords' => 'string|nullable|min:5',
            'global_description' => 'string|nullable|min:5',
            'image' => 'nullable|image|max:1024',
        ];
    }

    public function mount(Settings $settings)
    {
        $this->brand_text = $settings->brand_text;
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

        if ($this->brand_logo != null) {
            $brand_extension = $this->brand_logo->getClientOriginalExtension();
            $brand_url = $this->brand_logo->storeAs('images', 'brand_logo.' . $brand_extension);
            $settings->brand_logo = $brand_url;
        }
        
        $settings->brand_text = $this->brand_text;
        $settings->blogs_slug = $this->blogs_slug;
        $settings->global_author = $this->global_author;
        $settings->global_keywords = $this->global_keywords;
        $settings->global_description = $this->global_description;

        if ($this->image != null) {
            $image_extension = $this->image->getClientOriginalExtension();
            $image_url = $this->image->storeAs('images', 'image.' . $image_extension);
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
