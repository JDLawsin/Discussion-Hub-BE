<?php

namespace App\Services\Api;

use App\Models\Protocol;

class ProtocolService
{
    public function findOrFail(int $id): Protocol
    {
    return Protocol::with('user', 'tags')->withCount('threads')->findOrFail($id);
    }
}