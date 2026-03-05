<?php

namespace App\Services\Api;

use App\Models\Comment;

class CommentService
{
    public function getByThreadId(int $threadId, int $perPage = 10)
    {
       return Comment::with(['user', 'replies.user', 'replies.replies.user', 'replies.replies.replies.user'])
        ->where('thread_id', $threadId)
        ->whereNull('parent_id') 
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
    }
}