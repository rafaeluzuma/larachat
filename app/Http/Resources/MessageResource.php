<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => $this->message,
            'sender' => $this->sender,
            'receiver' => new UserResource($this->receiver),
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
            'me' => auth()->user()->id == $this->sender_id
        ];
    }
}
