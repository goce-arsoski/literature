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
    public $order_by = 'id';
    public $order_type = 'asc';

    protected $listeners = [
        '$refresh'
    ];

    public function delete_user(User $user)
    {
        $this->emitTo('modal', 'delete_user', $user->id);
    }

    public function order_by($order_by)
    {
        if ($order_by == $this->order_by) {
            if ($this->order_type == 'asc') {
                $this->order_type = 'desc';
            } else {
                $this->order_type = 'asc';
            }
        } else {
            $this->order_by = $order_by;
            $this->order_type = 'asc';
        }
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.users.index', [
            'users' => $users,
        ]);
    }
}
