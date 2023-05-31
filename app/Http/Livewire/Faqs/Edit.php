<?php

namespace App\Http\Livewire\Faqs;

use Livewire\Component;

use App\Models\Faqs;

class Edit extends Component
{
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
        $this->question = $faqs->question;
        $this->answer = $faqs->answer;
    }

    public function submit()
    {
        $this->validate();

        $faqs = $this->faqs;

        $faqs->question = $this->question;
        $faqs->answer = $this->answer;
        

        $faqs->save();

        session()->flash('message', 'FAQs successfully edited');
    }

    public function render()
    {
        dd($this->faqs);
        return view('livewire.faqs.edit');
    }
}