<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProtocolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'content'        => $this->content,
            'author'         => ['name' => $this->user->name],
            'tags'           => $this->tags->map(fn($tag) => ['name' => $tag->name]),
            'threadCount'    => $this->threads_count,
            'reviewCount'    => $this->review_count,
            'averageRating'  => $this->average_rating,
            'createdAt'      => $this->created_at->toISOString(),
        ];
    }
}
