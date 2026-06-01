<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRepo;
use App\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * return a view here
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * return a view here
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     * return a view here
     */
    public function edit(UserRepo $userRepo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if(auth()->user()->role === UserRole::ADMIN) {
            $user->update($request->all());
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
