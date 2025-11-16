<?php

namespace App\Http\Livewire\Prose;

use App\Models\Prose;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $proses = Prose::all();

        return view('livewire.prose.index', ['proses' => $proses]);
    }
}
