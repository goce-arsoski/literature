<?php

namespace App\Http\Livewire\Quotes;

use App\Models\Quote;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $quotes = Quote::all();

        return view('livewire.quotes.index', ['quotes' => $quotes]);
    }
}
