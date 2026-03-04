<?php

namespace App\Observers;

use App\Models\Vote;
use Illuminate\Support\Facades\Log;

class VoteObserver
{
    /**
     * Handle the Vote "created" event.
     */
    public function created(Vote $vote): void
    {
        $this->updateVoteCounts($vote);
    }

    /**
     * Handle the Vote "updated" event.
     */
    public function updated(Vote $vote): void
    {
        $this->updateVoteCounts($vote);
    }

    /**
     * Handle the Vote "deleted" event.
     */
    public function deleted(Vote $vote): void
    {
        $this->updateVoteCounts($vote);
    }

    private function updateVoteCounts(Vote $vote): void
    {
        $votable = $vote->votable;

        if (!$votable) return;

        $votable->update([
            'upvote_count'   => $votable->votes()->where('type', 'upvote')->count(),
            'downvote_count' => $votable->votes()->where('type', 'downvote')->count(),
        ]);
    }
}
