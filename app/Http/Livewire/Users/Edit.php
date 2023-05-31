<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $name;
    public $email;
    public $role;
    public $password;
    public $user;

    protected function rules()
    {
        return [
            'name' => 'string|required|min:8',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|nullable|min:8',
        ];
    }

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->implode(', ');
    }

    public function submit()
    {
        $this->validate();

        $user = $this->user;
        
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->password != null) {
            $user->password = Hash::make($this->password);
        }
        
        if ($this->role != 'no_role') {
            $user->syncRoles($this->role);
        } else {
            $user->syncRoles([]);
        }

        $user->save();

        session()->flash('flash.banner', 'User successfully edited');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('user.index');
    }

    public function render()
    {
        $roles = Role::all();

        return view('livewire.users.edit', [
            'roles' => $roles,
        ]);
    }
}
