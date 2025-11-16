<?php

namespace App\Http\Livewire\Poem;

use App\Models\Poem;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $poems = Poem::all();

        return view('livewire.poem.index', ['poems' => $poems]);
    }
}
