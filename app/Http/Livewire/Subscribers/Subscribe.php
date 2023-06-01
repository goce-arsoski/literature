<?php

namespace App\Http\Livewire\Subscribers;

use Livewire\Component;

use App\Models\Subscriber;

class Subscribe extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|unique:subscribers'
    ];

    public function submit()
    {
        $this->validate();
 
        $subscriber = Subscriber::create([
            'email' => $this->email
        ]);

        session()->flash('message', 'You have successfully subscribed!');
    }

    public function render()
    {
        return view('livewire.subscribers.subscribe');
    }
}
