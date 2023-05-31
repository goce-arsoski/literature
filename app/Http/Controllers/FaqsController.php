<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqsRequest;
use App\Http\Requests\UpdateFaqsRequest;
use App\Models\Faqs;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('edit_blogs'), 403);

        return view('faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('edit_blogs'), 403);
        
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Faqs $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faqs $faqs)
    {
        abort_if(Gate::denies('edit_blogs'), 403);
        
        return view('faqs.edit', compact('faqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqsRequest $request, Faqs $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faqs $faq)
    {
        //
    }
}
