<?php

namespace App\Services\Api;

use App\Models\Comment;
use App\Models\Thread;
use App\Models\Vote;

class VoteService
{
    private function resolveModel(string $votableType, int $votableId)
    {
        return match($votableType) {
            'thread'  => Thread::findOrFail($votableId),
            'comment' => Comment::findOrFail($votableId),
        };
    }

    public function vote(int $userId, string $votableType, int $votableId, string $type): array
    {
        $this->resolveModel($votableType, $votableId);

        $existing = Vote::where('user_id', $userId)
            ->where('votable_type', $votableType)
            ->where('votable_id', $votableId)
            ->first();

        if ($existing && $existing->type === $type) {
            $existing->delete();
            return ['message' => 'Vote removed.'];
        }

        if ($existing) {
            $existing->update(['type' => $type]);
            return ['message' => 'Vote updated.'];
        }

        Vote::create([
            'user_id'      => $userId,
            'votable_type' => $votableType,
            'votable_id'   => $votableId,
            'type'         => $type,
        ]);

        return ['message' => 'Vote submitted.'];
    }


    public function getUserVote(int $userId, string $votableType, int $votableId)
    {
        $vote = Vote::where('user_id', $userId)
            ->where('votable_type', $votableType)
            ->where('votable_id', $votableId)
            ->first();

        return $vote?->type;
    }
}