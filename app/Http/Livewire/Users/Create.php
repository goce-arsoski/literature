<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $email;
    public $role;
    public $password;

    protected $rules = [
        'name' => 'string|required|min:8',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ];

    public function submit()
    {
        $this->validate();
 
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($this->role != 'no_role') {
            $user->assignRole($this->role);
        }

        session()->flash('flash.banner', 'User successfully created');
        session()->flash('flash.bannerStyle', 'success');
        
        return redirect()->route('user.index');
    }

    public function render()
    {
        $roles = Role::all();

        return view('livewire.users.create', [
            'roles' => $roles,
        ]);
    }
}
