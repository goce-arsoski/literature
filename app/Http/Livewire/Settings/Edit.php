<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

use App\Models\Settings;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Process;

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

    public $admin_main;
    public $admin_hover;
    public $admin_sidebar_toggler_bg;
    public $admin_sidebar_toggler_arrow;
    
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

        $this->admin_main = $settings->admin_main;
        $this->admin_hover = $settings->admin_hover;
        $this->admin_sidebar_toggler_bg = $settings->admin_sidebar_toggler_bg;
        $this->admin_sidebar_toggler_arrow = $settings->admin_sidebar_toggler_arrow;
    }

    public function submit()
    {
        $this->blogs_slug = Str::lower($this->blogs_slug);

        $this->validate();

        $settings = $this->settings;

        $should_recompile = false;

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

        if ($settings->admin_main != $this->admin_main) {
            $should_recompile = true;
        } elseif ($settings->admin_hover != $this->admin_hover) {
            $should_recompile = true;
        } elseif ($settings->admin_sidebar_toggler_bg != $this->admin_sidebar_toggler_bg) {
            $should_recompile = true;
        } elseif ($settings->admin_sidebar_toggler_arrow != $this->admin_sidebar_toggler_arrow) {
            $should_recompile = true;
        }

        if ($should_recompile == true) {
            $settings->admin_main = $this->admin_main;
            $settings->admin_hover = $this->admin_hover;
            $settings->admin_sidebar_toggler_bg = $this->admin_sidebar_toggler_bg;
            $settings->admin_sidebar_toggler_arrow = $this->admin_sidebar_toggler_arrow;

            $colors_file = fopen("../colors.js", "w");
            $colors = 
"module.exports = {
    'admin-main': '" . $this->admin_main . "',
    'admin-hover': '" . $this->admin_hover . "',
    'admin-sidebar-toggler-bg': '" . $this->admin_sidebar_toggler_bg . "',
    'admin-sidebar-toggler-arrow': '" . $this->admin_sidebar_toggler_arrow . "',
}";
            fwrite($colors_file, $colors);
            fclose($colors_file);
    
            exec('PATH=$PATH:/usr/bin npm run build > /dev/null 2>/dev/null &');

            $message = 'Settings successfully edited. Please wait couple of seconds assets to recompile.';
        } else {
            $message = 'Settings successfully edited';
        }

        $settings->save();

        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
