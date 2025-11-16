<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Prose;
use App\Models\Settings;
use Illuminate\Http\Request;

class ProseController extends Controller
{
    public function adminIndex() {
        // Get all proses
        // $proses = Prose::all();
        // $settings = Settings::first();

        // return view('blogs.index', ['settings' => $settings]);
        return view('prose.index');
    }

    public function index()
    {
        // Get all proses
        $proses = Prose::all();

        return response()->json($proses);
    }

    public function show($id) {
        // Dummy data for testing
        $data = [
            'id' => $id,
            'title' => "Proza $id",
            'description' => "Description for Proza $id",
            'author' => "Author $id",
            'created_at' => now(),
        ];

        return response()->json($data);
    }

    public function store(Request $request) {
        // Validate the incoming data
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'author' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'image' => 'nullable|string', // or use 'image|mimes:jpg,png' for file uploads later
        // ]);

        // Save to database
        $prose = Prose::create([
            'author_id' => 1,
            'cover_image' => $request['image'] ?? null,
            'title' => $request['title'],
            'content' => $request['content'],
            'published_at' => Carbon::now(),
            'status' => 'published',
        ]);

        // Return JSON response
        return response()->json([
            'message' => 'Proza uspešno dodadena!',
            'prose' => $prose
        ], 201);
    }

    public function create() {
        return view('prose.create');
    }
}
