<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $per_page = 25;
    public $search = '';

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%');

        return view('livewire.users.index', [
            'users' => $users->paginate($this->per_page),
        ]);
    }
}
