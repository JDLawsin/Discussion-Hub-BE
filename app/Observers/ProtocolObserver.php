<?php

namespace App\Observers;

use App\Models\Protocol;
use App\Services\TypesenseService;

class ProtocolObserver
{
    public function __construct(protected TypesenseService $typesense) {}

    /**
     * Handle the Protocol "created" event.
     */
    public function created(Protocol $protocol): void
    {
        $protocol->load(['user', 'tags']);
        $this->typesense->indexProtocol($protocol);
    }

    /**
     * Handle the Protocol "updated" event.
     */
    public function updated(Protocol $protocol): void
    {
        $protocol->load(['user', 'tags']);
        $this->typesense->indexProtocol($protocol);
    }

    /**
     * Handle the Protocol "deleted" event.
     */
    public function deleted(Protocol $protocol): void
    {
        $this->typesense->deleteProtocol($protocol->id);
    }

    /**
     * Handle the Protocol "restored" event.
     */
    public function restored(Protocol $protocol): void
    {
        //
    }

    /**
     * Handle the Protocol "force deleted" event.
     */
    public function forceDeleted(Protocol $protocol): void
    {
        //
    }
}
