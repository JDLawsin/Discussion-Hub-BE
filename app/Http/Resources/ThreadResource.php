<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'body'         => $this->body,
            'author'       => ['name' => $this->user->name],
            'tags'         => $this->tags->map(fn($tag) => ['name' => $tag->name]),
            'upvoteCount'  => $this->upvote_count,
            'downvoteCount'=> $this->downvote_count,
            'commentCount' => $this->comments_count,
            'createdAt'    => $this->created_at->toISOString(),
        ];
    }
}
