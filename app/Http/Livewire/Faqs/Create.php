<?php

namespace App\Http\Livewire\Faqs;

use App\Models\Faq;

use Livewire\Component;

class Create extends Component
{
    public $question;
    public $answer;
    public $order;
    
    protected function rules()
    {
        return [
            'question' => 'string|required|min:8',
            'answer' => 'string|required|min:8',
        ];
    }

    public function submit()
    {
        $this->validate();

        $faq = Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
        ]);

        $faqs = Faq::all();

        $faq->order = count($faqs);
        $faq->save();

        session()->flash('flash.banner', 'FAQ successfully created');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('faq.index');
    }

    public function render()
    {
        return view('livewire.faqs.create');
    }
}
