<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Services\Api\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService) {}

    public function getCommentsByThreadId(Request $request, int $threadId)
    {
        $perPage = $request->query('perPage', 10);

        $comments = $this->commentService->getByThreadId($threadId, (int) $perPage);

        return CommentResource::collection($comments);
    }
}
