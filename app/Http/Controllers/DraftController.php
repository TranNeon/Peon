<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
//    TODO: create an auth middleware that verify the return $draft to be owned user of session.

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('draft.index',['ownedDrafts' =>   auth()->user()->drafts()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('draft.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required', 'content'=>'required']);
        Draft::create(["user_id" => auth()->user()->id, ...$request->all()]);
        return redirect(route('drafts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Draft $draft)
    {
//        dd($draft);
        return view('draft.show', ['draft' => $draft]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Draft $draft)
    {
        return view('draft.edit', compact('draft'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Draft $draft)
    {
        $request->validate(['title'=>'required', 'content'=>'required']);
        $draft->update($request->all());
        return redirect(route('drafts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Draft $draft)
    {
        $draft->delete();
        return redirect(route('drafts.index'));
    }
}
