<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Messages',
            'data' => $messages,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'message_content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        } else {
            $message = Message::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'message_content' => $request->message_content
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Message added successfully',
                'data' => $message,
            ], 200, [], JSON_PRETTY_PRINT);
        }
    }

    public function show($id)
    {
        $message = Message::find($id);
        if ($message) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Message',
                'data' => $message,
            ], 200, [], JSON_PRETTY_PRINT);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }
    }
}
