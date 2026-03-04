<?php

namespace App\Services\Api;

use App\Models\Review;


class ReviewService
{
    public function getByProtocolId(int $id, int $perPage = 10)
    {
        return Review::with('user')
            ->where('protocol_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function create(array $data): Review
    {
        return Review::create($data);
    }

    public function checkIfUserReviewed(int $protocolId, int $userId): bool
    {
        return Review::where('protocol_id', $protocolId)
            ->where('user_id', $userId)
            ->exists();
    }
}