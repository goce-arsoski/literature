<?php

namespace App\Http\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $authors = Author::all();

        return view('livewire.authors.index', ['authors' => $authors]);
    }
}
