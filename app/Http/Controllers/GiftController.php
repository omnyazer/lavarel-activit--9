<?php

namespace App\Http\Controllers;
use App\Models\Gift;
use App\Http\Requests\GiftRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\GiftCreated;


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
    public function store(GiftRequest $request)
    {
        $gift = Gift::create($request->validated());

        Mail::to('omnya.zerghouni@cloud-campus.fr')
            ->send(new GiftCreated($gift->name, $gift->price));

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
    public function update(GiftRequest $request, Gift $gift)
    {
        $gift->update($request->validated());

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
