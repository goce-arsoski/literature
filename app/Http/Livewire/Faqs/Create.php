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

        $faq_id = $faq->id;

        $faq->order = $faq_id;
        $faq->save();

        session()->flash('message', 'FAQ successfully created');
    }

    public function render()
    {
        return view('livewire.faqs.create');
    }
}
