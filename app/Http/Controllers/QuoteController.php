<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function adminIndex() {
        return view('quotes.index');
    }

    public function index()
    {
        $quotes = Quote::all();

        return response()->json($quotes);
    }

    public function create() {
        return view('quotes.create');
    }
}
