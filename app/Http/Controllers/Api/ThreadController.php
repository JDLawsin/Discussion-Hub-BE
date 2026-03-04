<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Services\Api\ThreadService;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct(protected ThreadService $threadService) {}

    public function getThreadsByProtocolId(Request $request, int $id)
    {
        $sort = $request->query('threadSort', 'recent');

        $threads = $this->threadService->getByProtocolId($id,$sort);

        return ThreadResource::collection($threads);
    }
}
