<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function adminIndex() {
        return view('poem.index');
    }

    public function index()
    {
        $poems = Poem::all();

        return response()->json($poems);
    }

    public function create() {
        return view('poem.create');
    }
}
