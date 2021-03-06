<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatApiController extends Controller
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;;
    }

    public function store(StoreMessageRequest $request)
    {
        $message = $request->user()
                            ->messages()
                            ->create($request->all());

        event(new NewMessageCreated($message));

        return new MessageResource($message);
    }

    public function messagesWithUser($id)
    {
        $message =  $this->message->conversationsWithUser($id);

        return MessageResource::collection($message);
    }
}
