<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('posts.index', ['publicPost'=> Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
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
    public function show(Request $request,\App\Models\Post $post )
    {
        return view('posts.show', ['post' => $post, 'location' => $request->getRequestUri()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function show_by_slug($slug, Request $request )
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', ['post' => $post, 'location' => $request->getRequestUri()]);
    }

    public function show_by_tag(Request $request, $tag_name )
    {

        return view('posts.index', ['publicPost'=> Tag::all()->where('name', $tag_name)->firstOrFail()->posts ]);
    }
}
