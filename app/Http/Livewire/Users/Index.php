<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->paginate($this->per_page_selected);

        return view('livewire.users.index', [
            'users' => $users,
        ]);
    }
}
