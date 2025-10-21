<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Logic to retrieve all posts
        return response()->json([
            'success' => true,
            'data' => $posts,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
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
            'user_id' => $user->id,
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
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'image_url' => 'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        // if validation is passed
        $post->content = $request->content;
        $post->image_url = $request->image_url;
        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post,
        ], 200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
        ], 200);
    }
}
