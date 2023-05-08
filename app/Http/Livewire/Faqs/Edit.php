<?php

namespace App\Http\Livewire\Faqs;

use Livewire\Component;

use App\Models\Faqs;

class Edit extends Component
{
    public $id;
    public $question;
    public $answer;
    public $order;
    public $faqs;
    
    protected function rules()
    {
        return [
            'question' => 'string|required|min:5',
            'answer' => 'string|required|min:5',
            'order' => 'integer|required',
        ];
    }

    public function mount(Faqs $faqs)
    {
        $this->faqs = $faqs;
    }

    public function submit()
    {
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

        session()->flash('message', 'FAQs successfully edited');
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
