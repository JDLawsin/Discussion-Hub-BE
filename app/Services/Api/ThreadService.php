<?php

namespace App\Services\Api;

use App\Models\Thread;
use Illuminate\Pagination\LengthAwarePaginator;

class ThreadService 
{
    public function getByProtocolId(int $protocolId, string $sort = 'recent', int $perPage = 5)
    {
        $query = Thread::with('user', 'tags')
            ->withCount('comments')
            ->where('protocol_id', $protocolId);

        match($sort) {
            'upvoted' => $query->orderBy('upvote_count', 'desc'),
            default   => $query->orderBy('created_at', 'desc'),
        };

        return $query->paginate($perPage);
    }
}