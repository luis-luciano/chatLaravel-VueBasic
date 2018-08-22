<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::with('user')->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'body' => $request->input('body'),
        ]);

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message);
    }
}
