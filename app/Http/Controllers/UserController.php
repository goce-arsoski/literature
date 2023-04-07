<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show_users(): View
    {
        return view('users.show', [
            'users' => User::all()
        ]);
    }
}
