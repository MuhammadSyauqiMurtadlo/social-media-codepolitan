<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        } else {
            $like = Like::create([
                'user_id' => $user->id,
                'post_id' => $request->post_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Like added successfully',
                'data' => $like,
            ], 200, [], JSON_PRETTY_PRINT);
        }
    }

    public function destroy($id)
    {
        Like::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Like deleted successfully',
        ], 200);
        // return response()->json(null, 204); --- IGNORE ---
    }
}
