<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Logic to retrieve all posts
        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    public function show($id) {}

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'content' => 'required|string|max:255',
            'image_url' => 'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }
        // if validation is passed
        $post = Post::create([
            'user_id' => $request->user_id,
            'content' => $request->content,
            'image_url' => $request->image_url,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a post by ID
    }

    public function destroy($id)
    {
        // Logic to delete a post by ID
    }
}
