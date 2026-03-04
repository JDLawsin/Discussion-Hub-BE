<?php

namespace App\Observers;

use App\Models\Thread;
use App\Services\TypesenseService;

class ThreadObserver
{
    public function __construct(protected TypesenseService $typesense) {}

    /**
     * Handle the Thread "created" event.
     */
    public function created(Thread $thread): void
    {
        $thread->load(['user', 'tags', 'protocol']);
        $this->typesense->indexThread($thread);
    }

    /**
     * Handle the Thread "updated" event.
     */
    public function updated(Thread $thread): void
    {
        $thread->load(['user', 'tags', 'protocol']);
        $this->typesense->indexThread($thread);
    }

    /**
     * Handle the Thread "deleted" event.
     */
    public function deleted(Thread $thread): void
    {
        $this->typesense->deleteThread($thread->id);
    }

    /**
     * Handle the Thread "restored" event.
     */
    public function restored(Thread $thread): void
    {
        //
    }

    /**
     * Handle the Thread "force deleted" event.
     */
    public function forceDeleted(Thread $thread): void
    {
        //
    }
}
