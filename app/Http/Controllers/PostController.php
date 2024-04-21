<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post/index');
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
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Adjust file size and types as needed
        ]);

        try {
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->content = $request->content;

            $image = $request->file('image');
            $imagePath = $image->store('art_submission', 'public');
            $post->image = $imagePath;

            $post->save();

            return response()->json(['text' => 'Successfully submitted a request to post your art.', 'data' => $post, 'status' => 200]);
        } catch (Exception $e) {
            return response()->json(['text' => 'There is an error submitting a request to post your art.', 'error' => $e->getMessage(), 'status' => 400]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
