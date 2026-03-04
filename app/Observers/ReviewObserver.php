<?php

namespace App\Observers;

use App\Models\Protocol;
use App\Models\Review;
use Illuminate\Support\Facades\Log;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        $this->updateProtocolStats($review->protocol);
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review): void
    {
        $this->updateProtocolStats($review->protocol);
    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        $this->updateProtocolStats($review->protocol);
    }

    private function updateProtocolStats(Protocol $protocol): void
    {
        $protocol->update([
            'review_count'   => $protocol->reviews()->count(),
            'average_rating' => round($protocol->reviews()->avg('rating') ?? 0, 2),
        ]);
    }
}
