<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id'            => $this->id,
            'author'        => ['name' => $this->user->name],
            'threadId'      => $this->thread_id,
            'parentId'      => $this->parent_id,
            'body'          => $this->body,
            'upvoteCount'   => $this->upvote_count,
            'downvoteCount' => $this->downvote_count,
            'created_at'    => $this->created_at->toISOString(),
            'updated_at'    => $this->updated_at->toISOString(),
            'deleted_at'    => $this->deleted_at?->toISOString(),
            'replies'       => CommentResource::collection($this->whenLoaded('replies'))
        ];
    }
}
