<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use App\Models\Post;
use App\Models\PostRequest;
use App\Models\Tag_Post;
use App\PostRequestStatus;
use Illuminate\Http\Request;

class PostRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("post_requests.index", ["ownedRequest" => auth()->user()->postRequests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_requests.create');
    }

    public function approve(Request $request, PostRequest $postRequest){
//        dd($postRequest);
            $postRequest->status = PostRequestStatus::Accepted;
            $postRequest->reviewer_id = auth()->user()->id;
            $postRequest->save();

            if(!$postRequest->post_id) {
                $post = Post::create([
                    'title' => $postRequest->title,
                    'content' => $postRequest->content,
                    'user_id' => $postRequest->draft->user->id,
                ]);
                $post->tags()->sync($postRequest->tags);
            } else {
                $post = Post::find($postRequest->post_id);
//                dd($post);
                $post->title = $postRequest->title;
                $post->content = $postRequest->content;
                $post->tags()->sync($postRequest->tags);
                $post->save();
            }

            return redirect()->route("reviewer-dashboard");
}
    public function deny(Request $request, PostRequest $postRequest){
        $postRequest->status = PostRequestStatus::Declined;
        $postRequest->reviewer_id = auth()->user()->id;
        $postRequest->save();
        return redirect()->route("reviewer-dashboard");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postRequest = PostRequest::create([ 'status' => 'pending' ,
            'draft_id'=> $request->draft_id,
            'title' => Draft::find($request->draft_id)->title,
            'content' => Draft::find($request->draft_id)->content,
            'post_id' => $request->post_id ?? null,
        ]);

//        for ($request->tags as $tag) {
//            PostRequestTag::create(['post_id' => $postRequest->id , 'tag_id' => $request-> $tag->id);
//    }

        $postRequest->tags()->sync($request->tags);

        return redirect(route("post-requests.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\PostRequest $postRequest)
    {
        return view("post_requests.show", ["postRequest" => $postRequest]);
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
}
