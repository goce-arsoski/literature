<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('edit_users'), 403);

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('edit_users'), 403);

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     abort_if(Gate::denies('edit_users'), 403);

    //     return view('users.show', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('edit_users'), 403);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }



    // React API
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function proza()
    {
        // Return a list with dammy data for prose
        return response()->json([
            [
                'id' => 1,
                'title' => 'Proza 1',
                'description' => 'Description for Proza 1',
                'author' => 'Author 1',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Proza 2',
                'description' => 'Description for Proza 2',
                'author' => 'Author 2',
                'created_at' => now(),
            ],
        ]);
    }

}

