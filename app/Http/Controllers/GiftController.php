<?php

namespace App\Http\Controllers;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::all();

        return view('gifts.index', compact('gifts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gifts.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'url' => 'nullable|url|starts_with:http://,https://',
            'details' => 'nullable|string',
        ]);

        Gift::create($validated);

        return redirect()->route('gifts.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        return view('gifts.edit', compact('gift'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gift $gift)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'url' => 'nullable|url|starts_with:http://,https://',
            'details' => 'nullable|string',
        ]);

        $gift->update($validated);

        return redirect()->route('gifts.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('gifts.index');
    }

}
