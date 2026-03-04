<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Services\Api\VoteService;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct(protected VoteService $voteService)
    {
    }

    public function vote(Request $request, int $votableId)
    {
        $request->validate([
            'type' => 'required|in:upvote,downvote',
        ]);

        $result = $this->voteService->vote(
            userId: $request->user()->id,
            votableType: $request->route('votableType'),
            votableId: $votableId,
            type: $request->input('type'),
        );

        return response()->json($result);
    }

    public function getUserVoteType(Request $request, int $votableId)
    {
        $type = $this->voteService->getUserVote(
            userId:      $request->user()->id,
            votableType: $request->route('votableType'),
            votableId:   $votableId,
        );

        return response()->json(['type' => $type]);
    }
}