<?php

namespace App\Http\Livewire\Faqs;

use Livewire\Component;

use App\Models\Faq;

class Edit extends Component
{
    public $question;
    public $answer;
    public $order;
    public $faq;
    
    protected function rules()
    {
        return [
            'question' => 'string|required|min:5',
            'answer' => 'string|required|min:5',
            'order' => 'integer|required',
        ];
    }

    public function mount(Faq $faq)
    {
        $this->faq = $faq;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function submit()
    {
        $this->validate();

        $faq = $this->faq;

        $faq->question = $this->question;
        $faq->answer = $this->answer;
        

        $faq->save();

        session()->flash('message', 'FAQs successfully edited');
    }

    public function render()
    {
        return view('livewire.faqs.edit');
    }
}